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

/**
 * Order Centra Products for Category
 */
add_filter( 'pre_get_posts', function ( $query ) {

    $taxonomy = 'silk_category';

    if ( isset( $query->query[ $taxonomy ] ) && $query->is_main_query() ) {

        $term = $query->query[ $taxonomy ];

        // Category sort from Centra
        if( !empty( $term ) ) {
            $query->set( 'meta_key', 'category_order_' . $term );
            $query->set( 'orderby', 'meta_value_num' );
            $query->set( 'order', 'asc' );
        }

        // TODO: Set this from Site Wide setting
        $query->set( 'posts_per_page', 5 );

        // TODO: Set sorting from filter etc
        switch ( !empty($_GET[ 'o' ]) ) {
            case 'price':
                $query->set( 'meta_key', 'price_sort' );
                $query->set( 'orderby', 'meta_value_num' );
                $query->set( 'order', 'asc' );
                break;
            case 'alpha':
                $query->set( 'orderby', 'title' );
                $query->set( 'order', 'asc' );
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




