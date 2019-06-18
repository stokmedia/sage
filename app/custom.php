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

add_filter( 'get_search_form', function ( $a ) {
    return null;
} );

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
add_filter( 'tiny_mce_before_init', function( $initArray ) {
    // Add style format 
	$styleFormats = array(  
		array(  
			'title' => 'Indent',  
			'block' => 'p',  
			'classes' => 'has-padding',
			'wrapper' => false,
			
		),  
	);  
    $initArray['style_formats'] = wp_json_encode( $styleFormats );  
    
    // Update Indent Format style
    $styles = 'p.has-padding { padding-left: 4.875rem; }';
    if ( isset( $initArray['content_style'] ) ) {
        $initArray['content_style'] .= ' ' . $styles . ' ';
    } else {
        $initArray['content_style'] = $styles . ' ';
    }
	
	return $initArray;
  
}  );  


// Testing to register own Taxonomy
$tax_args = array(
    'label'                      => 'Product Data',
    'public'                     => true,
    'hierarchical'               => false,
    'show_ui'                    => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => false,
    'args'                       => array( 'orderby' => 'term_order' ),
    'rewrite'                    => array( 'slug' => 'product_sku', 'with_front' => true, 'hierarchical' => false, 'ep_mask' => EP_ALL_ARCHIVES ),
    'query_var'                  => true
);

register_taxonomy( 'silk_product_sku', 'silk_products', $tax_args );

$tax_args = array(
    'label'                      => 'Variant Data',
    'public'                     => true,
    'hierarchical'               => false,
    'show_ui'                    => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => false,
    'args'                       => array( 'orderby' => 'term_order' ),
    'rewrite'                    => array( 'slug' => 'variant_sku', 'with_front' => true, 'hierarchical' => false, 'ep_mask' => EP_ALL_ARCHIVES ),
    'query_var'                  => true
);

register_taxonomy( 'silk_product_variant_sku', 'silk_products', $tax_args );


// Register Format dropdown
add_filter( 'custom_silk_taxonomy_args', function( $args ) {
    
    $taxonomy_args = array(
        array( 
            'name' => 'name',
            'taxonomy' => 'silk_product_sku',
            'slug' => 'productSku'
        ),
        array( 
            'name' => array('name', 'variantName'),
            'taxonomy' => 'silk_product_variant_sku',
            'slug' => 'sku'
        ),
    );

    return $taxonomy_args;
} );



/**
 * Image sizes
 */
update_option( 'large_size_w', 1200 );
update_option( 'large_size_h', 1200 );
update_option( 'large_crop', 0 );
update_option( 'medium_size_w', 640 );
update_option( 'medium_size_h', 640 );
update_option( 'large_crop', 0 );

add_image_size( 'main-logo-desktop', 120, 45 );
add_image_size( 'main-logo-mobile', 93, 35 );
add_image_size( 'footer-logo-desktop', 180, 68 );
add_image_size( 'instagram-bg', 1920, 1300, true );
add_image_size( 'category-banner', 1920, 535, true );
add_image_size( 'hero-banner', 1920, 745, true );
add_image_size( 'hero-banner-mobile', 640, 955, true );
add_image_size( 'newsletter', 960, 480, true );
add_image_size( 'newsletter-modal', 540, 435, true );
add_image_size( 'square-small', 480, 480, true );


// TODO: add custom size for category-banner-mobile