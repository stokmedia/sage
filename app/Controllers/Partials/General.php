<?php

namespace App\Controllers\Partials;

trait General
{
    public static function currentLang( $value='slug' )
    {
        $defaultValue = $value == 'locale' ? 'en_GB' : 'en';

		return function_exists('pll_current_language') ? pll_current_language( $value ) : $defaultValue;
    }

    public static function renderTitle( $title, $class='', $isH1=false )
    {
        if ($isH1) {
            return '<h1 class="'.$class.'">'.$title.'</h1>';
        } else {
            return '<h2 class="'.$class.'">'.$title.'</h2>';
        }
    }

    public static function getSizeGuideData()
    {
        return (object) [
            'image' => wp_get_attachment_image_url( get_field( 'size_guide_image', self::currentLang() ), 'full' )
        ];
    }
    
    public static function getDefaultUsp()
    {
        $defaultUsp = get_field( 'default_usp',self::currentLang() );
        $list = $defaultUsp['usp'] ?? []; 

        return $list;
    }

    public function defaultUsp()
    {
        return self::getDefaultUsp();
    }

    public function cookieData()
    {
        return (object) get_field( 'cookies', self::currentLang() ) ?? [];
    }

    public function newsletterData()
    {
        $newsletterEnable = get_field( 'newsletter_enable', self::currentLang() );
        $modalContent = (object) get_field( 'newsletter_modal_content', self::currentLang() );
        $modalContent->title = self::hasTitle($modalContent) ? $modalContent->section_title : '';
        $modalContent->image = $modalContent->image ? wp_get_attachment_image_url( $modalContent->image['ID'], 'newsletter' ) : null;      

        return (object) [
            'newsletter_enable' => $newsletterEnable,
            'newsletter_modal_content' => $modalContent,
            'form_settings' => (object) get_field( 'form_settings', self::currentLang() )
        ];
    }

    public function sizeGuideData()
    {
        return self::getSizeGuideData();
    }
    
    public function resellerLists()
    {
        $posts = get_posts([
            'post_type' => 'reseller',
            'posts_per_page'=> -1,
        ]);
    
        return array_map(function ($post) {
            $url = get_field( 'website', $post->ID );

            $link = [
                'url' => $url,
                'title' => preg_replace( "(^https?://)", "", $url ),
                'target' => '_blank',
            ];

            return [
                'title' => $post->post_title,
                'country' => get_field( 'country', $post->ID ),
                'city' => get_field( 'city', $post->ID ),
                'link' => $link,
                'is_agent' => get_field( 'is_agent', $post->ID ),
            ];
        }, $posts);        
    }
}