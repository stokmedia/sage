<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use App\Classes\Navigation;

class App extends Controller
{
    use Partials\General;
    use Partials\Content;

    protected $acf = true;

    public function socialLinks()
    {
        return self::getSocialLinks();
    }

    public function desktopMenu()
    {
        return Navigation::desktopMenu();
    }

    public function mobileMenu()
    {
        return Navigation::mobileMenu();
    }

    public function desktopFooterMenu()
    {
        return Navigation::desktopFooterMenu();
    }

    public function mobileFooterMenu()
    {
        return Navigation::mobileFooterMenu();
    }

    public function logo()
    {
        $logo = get_field( 'logo', 'global' );
        $mobileLogo = get_field( 'logo_mobile', 'global' );
        $footerLogo = get_field( 'logo_footer', 'global' );
        $output = array( 'desktop' => '', 'mobile' => '', 'mobile_menu' => '', 'footerLogo' => '' );

        if ( $logo[ 'logo' ] ) {
            $output[ 'desktop' ] = wp_get_attachment_image( $logo[ 'logo' ], 'main-logo-desktop' );

            if ( strpos( $output[ 'desktop' ], '.svg' ) !== false && $logo[ 'width' ] && $logo[ 'height' ] ) {
                $output[ 'desktop' ] = '<img src="' . wp_get_attachment_image_url( $logo[ 'logo' ] ) . '" alt="" width="' . $logo[ 'width' ] . '" height="' . $logo[ 'height' ] . '">';
            }
        }

        if ( $mobileLogo[ 'logo' ] ) {
            $output[ 'mobile' ] = wp_get_attachment_image( $mobileLogo[ 'logo' ], 'main-logo-mobile', false, array( 'class' => 'mobile-logo' ) );

            if ( strpos( $output[ 'mobile' ], '.svg' ) !== false && $mobileLogo[ 'width' ] && $mobileLogo[ 'height' ] ) {
                $output[ 'mobile' ] = '<img src="' . wp_get_attachment_image_url( $mobileLogo[ 'logo' ] ) . '" class="mobile-logo" alt="" width="' . $mobileLogo[ 'width' ] . '" height="' . $mobileLogo[ 'height' ] . '">';
            }

            $output[ 'mobile_menu' ] = str_replace( 'class="mobile-logo"', '', $output[ 'mobile' ] );
        }

        if ( $footerLogo[ 'logo' ] ) {
            $output[ 'footerLogo' ] = wp_get_attachment_image( $footerLogo[ 'logo' ], 'footer-logo-desktop' );

            if ( strpos( $output[ 'footerLogo' ], '.svg' ) !== false && $footerLogo[ 'width' ] && $footerLogo[ 'height' ] ) {
                $output[ 'footerLogo' ] = '<img src="' . wp_get_attachment_image_url( $footerLogo[ 'logo' ] ) . '" class="mobile-logo" alt="" width="' . $footerLogo[ 'width' ] . '" height="' . $footerLogo[ 'height' ] . '">';
            }
        }

        return $output;
    }

    public function homeUrl()
    {
        return esc_url(home_url('/'));
    }

    public function siteName()
    {
        return get_bloginfo( 'name' );
    }

    public static function getSocialLinks()
    {
        return get_field( 'links', 'global' );
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

    public static function format_centra_markup( $str ) {
        $str = preg_replace('/\[b\]([^\[]+)\[\/b\]/', '<strong>$1</strong>', $str);
        $str = preg_replace('/\n/', '<br/>', $str);
        return $str;
    } 

}
