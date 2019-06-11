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

    public function defaultUsp()
    {
        $defaultUsp = get_field( 'default_usp',self::currentLang() );
        $list = $defaultUsp['usp'] ?? []; 

        return $list;
    }

    public function cookieData()
    {
        return (object) get_field( 'cookies', self::currentLang() ) ?? [];
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