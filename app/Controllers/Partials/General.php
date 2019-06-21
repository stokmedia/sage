<?php

namespace App\Controllers\Partials;

use App\Classes\Helper;

trait General
{
    // public static function siteTranslate( $fieldName )
    // {
    //     return get_field( $fieldName, Helper::current_lang() );
    // }
    
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
            'image' => wp_get_attachment_image_url( get_field( 'size_guide_image', Helper::current_lang() ), 'full' )
        ];
    }
    
    public static function getDefaultUsp()
    {
        $defaultUsp = get_field( 'default_usp', Helper::current_lang() );
        $list = $defaultUsp['usp'] ?? []; 

        return $list;
    }

    public static function getResellerLists()
    {
        $posts = get_posts([
            'post_type' => 'reseller',
            'posts_per_page'=> -1,
        ]);
    
        return array_map( function ($post) {
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
        }, $posts );
    }

    public static function getSiteTranslations()
    {
        return (object) [
            'general' => get_field( 'translate_general', Helper::current_lang() ),
            'selected_product' => get_field( 'translate_selected_product', Helper::current_lang() ),
        ];
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
}