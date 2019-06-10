<?php

namespace App;

// Disable search page
add_action( 'parse_query', function( $query, $error = true ) {
    if ( is_search() ) {
        $query->is_search = false;
        $query->query_vars['s'] = false;
        $query->query['s'] = false;

        if ( $error == true )
            $query->is_404 = true;
    }
} );

add_filter( 'get_search_form', create_function( '$a', "return null;" ) );

// Unregister Search widget
add_action( 'widgets_init', function() {
    unregister_widget( 'WP_Widget_Search' );
} );

// Make flexible content layout title dynamic
add_filter( 'acf/fields/flexible_content/layout_title/name=sections', function( $title, $field, $layout, $i ) {
    if( $sectionTitle = get_sub_field( 'section_title' ) ) {
		$title = $sectionTitle;	
	}	
	
	return $title;
}, 10, 4);


// Map section to specific template that they should appear.
// If layout does not exists in the mapping, then the layout will always appear in the section
add_filter( 'acf/prepare_field/name=sections', function( $field ) {
    global $post;

    $mapping =  array( 
        'resellers' => array( 'views/template-resellers.blade.php' ) 
    );

    $layouts = $field['layouts'];
    $field['layouts'] = [];

    foreach ($layouts as $layout) {

        $key = $layout['name'];

        // if the layout name isn't in our mapping array
        if ( ! array_key_exists($key, $mapping)) {
            $field['layouts'][] = $layout;
            continue;
        }
        
        if( in_array( get_page_template_slug($post), $mapping[$key] ) ) {
            $field['layouts'][] = $layout;
        }
    }

    return $field;
});

// Register Format dropdown
add_filter( 'mce_buttons_2', function( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
} );

// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', function( $init_array ) {  
	$style_formats = array(  
		array(  
			'title' => 'Indent',  
			'block' => 'p',  
			'classes' => 'has-padding',
			'wrapper' => false,
			
		),  
	);  
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = wp_json_encode( $style_formats );  
	
	return $init_array;  
  
}  );  

/**
 * Image sizes
 */
add_image_size( 'main-logo-desktop', 120, 45 );
add_image_size( 'main-logo-mobile', 93, 35 );
add_image_size( 'footer-logo-desktop', 180, 68 );
add_image_size( 'category-banner', 1920, 535 );

// TODO: add custom size for category-banner-mobile