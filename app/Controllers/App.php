<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use App\Classes\Navigation;

class App extends Controller
{
    use Partials\General;
    use Partials\Content;

    protected $acf = true;

    public function desktopMenu()
    {
        self::pr(get_fields('global'));
        return Navigation::desktopMenu();
    }

    public function mobileMenu()
    {
        return Navigation::mobileMenu();
    }

    public function logo()
    {
        $logo = get_field( 'logo', 'global' );

        if( $logo['logo'] ) {
            $logo['logo'] = wp_get_attachment_image( $logo['logo'] );
        }
    }

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
    /*
        // TODO: Could we use a general function to generate the image tag in the templates for Centra Product Images
        public function renderProductImage( $imageData, $size ) {

        }
    */

}
