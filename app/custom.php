<?php

namespace App;

// Disable search page
add_action( 'parse_query', __NAMESPACE__ . '\\wpb_filter_query' );
function wpb_filter_query( $query, $error = true ) {
    if ( is_search() ) {
        $query->is_search = false;
        $query->query_vars['s'] = false;
        $query->query['s'] = false;

        if ( $error == true )
            $query->is_404 = true;
    }
}

add_filter( 'get_search_form', create_function( '$a', "return null;" ) );

add_action( 'widgets_init', __NAMESPACE__ . '\\remove_search_widget' );
function remove_search_widget() {
    unregister_widget('WP_Widget_Search');
}