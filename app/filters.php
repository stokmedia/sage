<?php

namespace App;

/**
 * Add <body> classes
 */
add_filter('body_class', function (array $classes) {
    /** Add page slug if it doesn't exist */
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes)) {
            $classes[] = basename(get_permalink());
        }
    }

    /** Add class if sidebar is active */
    if (display_sidebar()) {
        $classes[] = 'sidebar-primary';
    }

    /** Clean up class names for custom templates */
    $classes = array_map(function ($class) {
        return preg_replace(['/-blade(-php)?$/', '/^page-template-views/'], '', $class);
    }, $classes);

    return array_filter($classes);
});

/**
 * Add "… Continued" to the excerpt
 */
add_filter('excerpt_more', function () {
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
});

/**
 * Template Hierarchy should search for .blade.php files
 */
collect([
    'index', '404', 'archive', 'author', 'category', 'tag', 'taxonomy', 'date', 'home',
    'frontpage', 'page', 'paged', 'search', 'single', 'singular', 'attachment', 'embed'
])->map(function ($type) {
    add_filter("{$type}_template_hierarchy", __NAMESPACE__.'\\filter_templates');
});

/**
 * Render page using Blade
 */
add_filter('template_include', function ($template) {
    collect(['get_header', 'wp_head'])->each(function ($tag) {
        ob_start();
        do_action($tag);
        $output = ob_get_clean();
        remove_all_actions($tag);
        add_action($tag, function () use ($output) {
            echo $output;
        });
    });
    $data = collect(get_body_class())->reduce(function ($data, $class) use ($template) {
        return apply_filters("sage/template/{$class}/data", $data, $template);
    }, []);
    if ($template) {
        echo template($template, $data);
        return get_stylesheet_directory().'/index.php';
    }
    return $template;
}, PHP_INT_MAX);

/**
 * Render comments.blade.php
 */
add_filter('comments_template', function ($comments_template) {
    $comments_template = str_replace(
        [get_stylesheet_directory(), get_template_directory()],
        '',
        $comments_template
    );

    $data = collect(get_body_class())->reduce(function ($data, $class) use ($comments_template) {
        return apply_filters("sage/template/{$class}/data", $data, $comments_template);
    }, []);

    $theme_template = locate_template(["views/{$comments_template}", $comments_template]);

    if ($theme_template) {
        echo template($theme_template, $data);
        return get_stylesheet_directory().'/index.php';
    }

    return $comments_template;
}, 100);

/**
 * ACF save json folder
 */
add_filter( 'acf/settings/save_json', function ( $path ) {
    return get_stylesheet_directory() . '/acf-json';
});

/**
 * ACF load json folder
 */
add_filter( 'acf/settings/load_json', function ( $paths ) {
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
});


// TODO: Maybe move all of the following Centra related filters to the Esc Plugin instead

/**
 * Order Centra Products for Category
 */
add_filter( 'pre_get_posts', function ( $query ) {

    $taxonomy = 'silk_category';
    if ( isset( $query->query[ $taxonomy ] ) && $query->is_main_query() ) {

        $market = $_SESSION['esc_store']['market'];
        $priceList = $_SESSION['esc_store']['pricelist'];

        $term = $query->query[ $taxonomy ];

        // Category sort from Centra
        if( !empty( $term ) ) {
            $query->set( 'meta_key', 'category_order_' . $term );
            $query->set( 'orderby', 'meta_value_num' );
            $query->set( 'order', 'asc' );
        }

        // in_stock_2_xs
        // in_stock_2_s
        // in_stock_2_m
        // in_stock_2_l
        // in_stock_2_xl
        // in_stock_2_xxl
        // pr( $_GET );

        $meta = array();
        if (isset($_GET['size']) && is_array($_GET['size'])) {
            foreach ($_GET['size'] as $val) {
                $val = strtolower($val);
                $meta[] = array(
                    'key' => 'in_stock_' . $market . '_' . $val,
                    'value' => 1,
                    'compare' => '='
                );
            }
        }
        // pr(  $meta );
        $meta = array(
            array(
            'key' => 'in_stock_' . $market . '_' . $val,
            'value' => 1,
            'compare' => '='
            ),
            array(
            'key' => 'in_stock_2_m',
            'value' => 0,
            'compare' => '='
            )
        );
        // pr(  $meta );
        $query->set('meta_query',$meta );

        // TODO: Set this from Site Wide setting
        $query->set( 'posts_per_page', -1 );

        // TODO: Set sorting from filter etc
        switch ( !empty($_GET[ 'o' ]) ) {
            case 'price':
                $query->set( 'meta_key', 'price_' . $market . '_' . $priceList );
                $query->set( 'orderby', 'meta_value_num' );
                $query->set( 'order', 'desc' );
                break;
            case 'alpha':
                $query->set( 'orderby', 'title' );
                $query->set( 'order', 'desc' );
                break;
            case 'pop':
                $query->set( 'meta_key', 'sort_in_' . $query->query[ 'product-categories' ] );
                $query->set( 'orderby', 'meta_value_num' );
                $query->set( 'order', 'asc' );
                break;
        }

        // TODO: Set sorting from filter etc
        /*
        $tax_query = apply_filters( 'esc_product_listing_filter', $_GET );
        $query->tax_query->queries[ ] = $tax_query;
        $query->set( 'tax_query', $query->tax_query->queries );
        */
 
    }

});

/**
 * Add REST API support to an already registered post type.
 */
add_filter( 'register_post_type_args', function ( $args, $post_type ) {
 
    if ( 'silk_products' === $post_type ) {

        $args['show_in_rest'] = true;
 
        // Optionally customize the rest_base or rest_controller_class
        $args['rest_base']             = 'products';
        $args['rest_controller_class'] = 'App\Classes\Silk_Product_REST_Controller';
    }
 
    return $args;
}, 10, 2 );

/**
 * Add REST API support to an already registered taxonomy.
 */
add_filter( 'register_taxonomy_args', function ( $args, $taxonomy ) {
 
    if ( 'silk_category' === $taxonomy ) {

        $args['show_in_rest'] = true;
        $args['query_var'] = true;
    }
 
    return $args;
}, 10, 2 );

/**
 * Check the orderby param for the particular REST API for hte custom post type. 
 */
add_filter( 'rest_silk_products_collection_params', function ( $params ) {

    $params['orderby']['enum'][] = 'price_low';

    return $params;
}, 10, 1 );

/**
 * Check the orderby param for the particular REST API for hte custom post type. 
 */
add_filter( 'rest_silk_products_query', function ( $query_vars, $request ) {

    $orderby = $request->get_param('orderby');

    if (isset($orderby) && $orderby === 'price_low') {

        // TODO: We should put these inside the Esc Plugin instead.
        // eg: EscConnect::getMarket(), EscConnect::getPricelist();
        $market = $_SESSION['esc_store']['market'];
        $priceList = $_SESSION['esc_store']['pricelist'];

        // TODO: Add support for asc/desc
        $query_vars["orderby"] = "meta_value_num";
        $query_vars['meta_key'] = 'price_' . $market . '_' . $priceList;
        $query_vars["order"] = "asc";

    } else {

        // TODO: Make REST API and regular product listing use same query
        $term_id = $request->get_param('silk_category')[0];

        $term = get_term_by('id', $term_id, 'silk_category');

        /** The taxonomy we want to parse */
        $taxonomy = "silk_category";

        /** Get terms that have children */
        $hierarchy = _get_term_hierarchy($taxonomy);

        $termSlug = $term->slug;

        while( !empty($term->parent) ) {
            $term = get_term_by('id', $term->parent, 'silk_category');
            $termSlug =  $term->slug . '/' . $termSlug;
        }

        if( $$termSlug ) {
            // Category sort from Centra
            if( !empty( $term ) ) {
                $query_vars["orderby"] = "meta_value_num";
                $query_vars['meta_key'] = 'category_order_' . $term->slug;
                $query_vars["order"] = "asc";
            }
        }
    }

    return $query_vars;

}, 10, 2);



