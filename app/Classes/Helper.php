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
        if (function_exists('pll_get_post') && !empty( $defaultPageId )) {
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

    /**
     * Explode string to array 
     * Allowed functionName value is explode and preg_split only
     * 
     * @param $delimeter string, $text string, $functionName string
     * @return array
     */
    public static function sp_split_string( $delimeter, $text, $functionName='explode' ) {
        return array_map( function($item) {
            return trim($item);
        }, $functionName( $delimeter, $text) );
    }

    public static function sp_parse_product_details( $subject ) {
        if( empty($subject) ) {
            return [];
        }

    	$details = array();

    	// This regexp is a bit more felxible with withspace etc
        $pattern = '/##(.*)##(<br \\/>|\s)([^#]*)/';
		
		//$pattern = '/###(.*)###(\\n|<br \\/>)\\n([^#]*)/';
		$matches = array();
		$result = preg_match_all($pattern, $subject, $matches);

		if ($result) {

			for( $i=0; $i < $result; $i++ ) { 
				$key = $matches[ 1 ][ $i ];
                $val = $matches[ 3 ][ $i ];
                
				$details[ strtolower($key) ] = [
					'label' => $key,
					'content' => self::sp_render_list($val)
				];
            }
            
		} else {

			$details['description'] = [
				'label' => '',
				'content' => self::sp_render_list($subject)
            ];
            
		}

		return $details;
    }
    
    public static function sp_render_list( $text ) 
    {
        if( empty($text)) {
            return '';
        }
                                
        $string = preg_replace( "/\*+(.*)?/i", "<ul><li>$1</li></ul>", strip_tags($text) );
        $string = preg_replace( "/(\<\/ul\>\n(.*)\<ul\>*)+/", "", $string );

        return $string;
    }

    public static function get_unique_post_meta_value( $postType, $key )
    {   
        global $wpdb;

        $query = "
        SELECT DISTINCT pm.meta_value FROM {$wpdb->postmeta} pm
        LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id
        WHERE p.post_status = 'publish'";
    
        if (!empty($postType)) {
            $cond = $wpdb->prepare(' AND p.post_type = %s', $postType);
            $query .= $cond;
        }
    
        if (!empty($key)) {
            $cond = $wpdb->prepare(' AND pm.meta_key = %s', $key);
            $query .= $cond;
        } 
    
        $result = $wpdb->get_col( $query );

        return $result;
    }


}