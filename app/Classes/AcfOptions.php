<?php

namespace App\Classes;


class AcfOptions 
{
    protected $options;
    protected $menuSlug;

    function __construct() 
    {   
        $this->menuSlug = 'general-settings';
        $this->options = array( 'global' );

        if( !function_exists( 'acf_add_options_page' ) || !function_exists( 'pll_languages_list' ) ) {
            return;
        }

        if( pll_languages_list( 'slug' ) ) {
            array_push(  $this->options, pll_languages_list( 'slug' ) );
        }

        $this->renderOptionsPage();
    }

    private function renderOptionsPage() 
    {
        if (!$this->options) { 
            return;
        }

        acf_add_options_page( array(
            'page_title' => 'Sitewide',
            'menu_title' => 'Sitewide',
            'menu_slug' => $this->menuSlug,
            'redirect' => true
        ) );
            
        foreach ($this->options as $option) {
            acf_add_options_sub_page( array(
                'page_title' 	=> 'Site Options ('. ucfirst($option) .')',
                'menu_title'	=> 'Site Options ('. ucfirst($option) .')',
                'menu_slug'  	=> $this->menuSlug . '-' .$option,
                'post_id'    	=> $option,	
                'parent_slug'	=> $this->menuSlug,
            ) );
        }
                  
    }
    
}

new AcfOptions();