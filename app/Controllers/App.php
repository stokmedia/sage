<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class App extends Controller
{
    use Partials\General;
    use Partials\Content;

    protected $acf = true;

    public function siteName()
    {
        return get_bloginfo( 'name' );
    }

    public static function title()
    {
        if ( is_home() ) {
            if ( $home = get_option( 'page_for_posts', true ) ) {
                return get_the_title( $home );
            }
            return __( 'Latest Posts', 'sage' );
        }
        if ( is_archive() ) {
            return get_the_archive_title();
        }
        if ( is_search() ) {
            return sprintf( __( 'Search Results for %s', 'sage' ), get_search_query() );
        }
        if ( is_404() ) {
            return __( 'Not Found', 'sage' );
        }
        return get_the_title();
    }

    public static function desktopNavigation()
    {
        if ( !has_nav_menu( 'header_navigation' ) ) {
            return null;

        }

        // Add or modify classes
        $menu = wp_nav_menu( [
            'theme_location' => 'header_navigation',
            'depth' => 1,
            'echo' => false,
            'menu_class' => 'navbar-nav m-auto' ] );

        $menu = str_replace( 'menu-item', 'nav-item menu-item', $menu );
        $menu = str_replace( 'href', 'class="nav-link" href', $menu );

        return $menu;
    }
    /*
        // TODO: Could we use a general function to generate the image tag in the templates for Centra Product Images
        public function renderProductImage( $imageData, $size ) {

        }
    */

}
