<?php

namespace App\Classes;

class Helper {

    /**
     * Gets the term id value to be pass as $post_id 
     * parameter to ACF. Will only return a value if
     * current page is a category page.
     *
     * @return string 
     */
    public static function get_acf_term_id() {
        if( !is_tax() && !is_category() ) {
            return null;
        }

        return get_queried_object()->taxonomy . '_' . get_queried_object()->term_id;
    }

    /**
     * Gets the image alt text.
     * Default: Site title
     *
     * @return string
     */
    public static function get_image_alt( $imageID ) {
        $alt = get_post_meta( $imageID, '_wp_attachment_image_alt', true);

        return (!$alt) ? get_bloginfo( 'name' ) : $alt;
    }

    /**
     * Get current language
     *
     * @param $value string
     * @return string 
     */
    public static function current_lang( $value='slug' ) {
        $defaultValue = $value == 'locale' ? 'en_GB' : 'en';

		return function_exists('pll_current_language') ? pll_current_language( $value ) : $defaultValue;
    }  
    
    /**
     * Get translated sitewide field value
     *
     * @param $fieldName string
     * @return string 
     */
    public static function localize( $fieldName ) {
		return get_field( $fieldName, self::current_lang() );
    }     

    /**
     * Gets the translated page of saved architecture pages in Silk settings
     *
     * @return int 
     */
    public static function get_silk_architecture_page( $type = null ) {
        $pageId = null;
        $architecturePages = get_option('esc_architecture_options');
        $defaultPageId = $architecturePages['esc_'. $type .'_page'];

        // Gets the translated page of architecture page
        if (!empty( $defaultPageId )) {
            $pageId = pll_get_post( $defaultPageId, pll_current_language() );
        }

        // Gets default language page id if the status of translated page is trashed
        if (get_post_status( $pageId ) === 'trash') {
            $pageId = $defaultPageId;
        }

        return $pageId;
    }


    /**
     * Replace shortcode from text.
     * This will replace the shortcode (array key) with the array value
     *
     * @param $replaces array, $template text
     * @return text 
     */
    public static function sp_render_text( $replaces, $template ) {
        if (!$replaces && !$template) {
            return; 
        }

        $str = preg_replace_callback( '/\[(.+?)\]/', function ( $matches ) use ( $replaces ) {
            return isset($replaces[ $matches[1] ]) ? $replaces[ $matches[1] ] : '';
        }, $template );

        return $str;
    }

    /**
     * Get array value by index
     *
     * @param $arr array, $pos number
     * @return array 
     */
    public static function get_array_value_by_index( $arr, $pos ) {
        if( empty($arr[ $pos ]) ) {
            return;
        }

        return $arr[ $pos ];
    }    



}