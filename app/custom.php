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