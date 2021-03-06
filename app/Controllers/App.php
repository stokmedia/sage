<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use App\Classes\Navigation;
use App\Classes\Helper;
use App\Classes\Breadcrumbs;
use App\Classes\SectionHelper;

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
            $output[ 'desktop' ] = wp_get_attachment_image( $logo[ 'logo' ], 'main-logo-desktop lazy' );

            if ( strpos( $output[ 'desktop' ], '.svg' ) !== false && $logo[ 'width' ] && $logo[ 'height' ] ) {
                $output[ 'desktop' ] = '<img data-src="' . wp_get_attachment_image_url( $logo[ 'logo' ] ) . '" alt="" width="' . $logo[ 'width' ] . '" height="' . $logo[ 'height' ] . '" class="lazy">';
            }
        }

        if ( $mobileLogo[ 'logo' ] ) {
            $output[ 'mobile' ] = wp_get_attachment_image( $mobileLogo[ 'logo' ], 'main-logo-mobile', false, array( 'class' => 'mobile-logo lazy' ) );

            if ( strpos( $output[ 'mobile' ], '.svg' ) !== false && $mobileLogo[ 'width' ] && $mobileLogo[ 'height' ] ) {
                $output[ 'mobile' ] = '<img data-src="' . wp_get_attachment_image_url( $mobileLogo[ 'logo' ] ) . '" class="mobile-logo lazy" alt="" width="' . $mobileLogo[ 'width' ] . '" height="' . $mobileLogo[ 'height' ] . '">';
            }

            $output[ 'mobile_menu' ] = str_replace( 'class="mobile-logo"', '', $output[ 'mobile' ] );
        }

        if ( $footerLogo[ 'logo' ] ) {
            $output[ 'footerLogo' ] = wp_get_attachment_image( $footerLogo[ 'logo' ], 'footer-logo-desktop lazy' );

            if ( strpos( $output[ 'footerLogo' ], '.svg' ) !== false && $footerLogo[ 'width' ] && $footerLogo[ 'height' ] ) {
                $output[ 'footerLogo' ] = '<img data-src="' . wp_get_attachment_image_url( $footerLogo[ 'logo' ] ) . '" class="mobile-logo lazy" alt="" width="' . $footerLogo[ 'width' ] . '" height="' . $footerLogo[ 'height' ] . '">';
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

    public function checkoutLink()
    {
        $checkoutPage = Helper::get_silk_architecture_page( 'selection' );
        return $checkoutPage ? get_permalink( $checkoutPage ) : '';
    }

    public function checkoutLinkArray()
    {
        return (object) [
            'title' => $this->siteTranslate()->selections['go_to_checkout'] ?? '',
            'url' => $this->checkoutLink()
        ];
    }

    public function displayFooter()
    {
        return (get_page_template_slug() !== 'views/template-checkout.blade.php');
    }

    public function newsletterData()
    {
        $lang = Helper::current_lang();
        $newsletterEnable = get_field( 'newsletter_enable', $lang );
        $modalContent = (object) get_field( 'newsletter_modal_content', $lang );
        $modalContent->title = SectionHelper::has_title($modalContent) ? $modalContent->section_title : '';
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
    
    public function breadcrumbs()
    {
        // Do not display breadcrumbs on index pages
        if (is_front_page()) {
            return false;
        }

        $breadcrumbs = new Breadcrumbs();

        return $breadcrumbs->render_breadcumbs( [
            'container_tag'     => 'div',
            'container_class'   => 'breadcrumb is-vertical d-inline-block',
            'template'          => '<a class="breadcrumb-item" href="{link}">{title}</a>',
            'template_active'   => '<span class="breadcrumb-item active">{title}</span>',
        ]);
    }

    public function footerBreadcrumbs()
    {
        // Do not display breadcrumbs on index pages
        if (is_front_page()) {
            return false;
        }

        $breadcrumbs = new Breadcrumbs();     

        return $breadcrumbs->render_breadcumbs( [
            'container_tag'     => 'div',
            'container_class'   => 'breadcrumb bg-white mb-0 justify-content-center',
            'template'          => '<a class="breadcrumb-item" href="{link}">{title}</a>',
            'template_active'   => '<span class="breadcrumb-item active">{title}</span>',
        ]);
    }    

    public function selection()
    {
        return \EscGeneral::getSelection();
    }

    public function scripts()
    {
        return (object) [
            'header_script' => get_field( 'header_scripts', 'global'),
            'footer_script' => get_field( 'footer_scripts', 'global'),
        ];
    }

    /*
        // TODO: Could we use a general function to generate the image tag in the templates for Centra Product Images
        public function renderProductImage( $imageData, $size ) {

        }
    */

}
