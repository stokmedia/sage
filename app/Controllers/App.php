<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use App\Classes\Navigation;
use App\Classes\Helper;

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

    public function siteTranslate()
    {
        return self::getSiteTranslations();
    }

    public function defaultUsp()
    {
        return self::getDefaultUsp();
    }

    public function cookieData()
    {
        return (object) get_field( 'cookies', Helper::current_lang() ) ?? [];
    }

    public function newsletterData()
    {
        $lang = Helper::current_lang();
        $newsletterEnable = get_field( 'newsletter_enable', $lang );
        $modalContent = (object) get_field( 'newsletter_modal_content', $lang );
        $modalContent->title = self::hasTitle($modalContent) ? $modalContent->section_title : '';
        $modalContent->image = !empty($modalContent->image) ? wp_get_attachment_image_url( $modalContent->image['ID'], 'newsletter' ) : null;      

        return (object) [
            'newsletter_enable' => $newsletterEnable,
            'newsletter_modal_content' => $modalContent,
            'form_settings' => (object) get_field( 'form_settings', $lang )
        ];
    }

    public function sizeGuideData()
    {
        return self::getSizeGuideData();
    }

    public function resellerLists()
    {
        return self::getResellerLists();
    }    

    /*
        // TODO: Could we use a general function to generate the image tag in the templates for Centra Product Images
        public function renderProductImage( $imageData, $size ) {

        }
    */

}
