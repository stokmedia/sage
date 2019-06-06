<?php

namespace App\Controllers\Partials;

trait Content
{
    public function content()
    {
        $data = [];

        $flexibleContent = get_field('sections');

        if( $flexibleContent ) {
            foreach ($flexibleContent as $content) {
                $functionName = 'cms_' . str_replace( '-', '_', $content['acf_fc_layout'] );

                if( method_exists( $this, $functionName ) ) {
                    $thisContent = (object) self::$functionName( $content );

                    if( !empty($thisContent) ) {
                        array_push( $data, $thisContent );
                    }
                }
            }
        }
        return $data;
    }
    
    public static function cms_hero_banner( $data )
    {   
        return (object) $data;
    }

    public static function cms_instagram_grid( $data )
    {   
        return (object) $data;
    }  
    
    public static function cms_newsletter_signup( $data )
    {   
        return (object) $data;
    }   
    
    public static function cms_newsletter( $data )
    {   
        return (object) $data;
    }    
    
    public static function cms_popular_products( $data )
    {   
        return (object) $data;
    }    
    
    public static function cms_promo_boxes( $data )
    {   
        return (object) $data;
    }  
    
    public static function cms_text_and_image( $data )
    {
        $newData = (object) $data;
        $hasTitle = ($newData->section_title && $newData->show_section_title);
        $hasContent = ( $hasTitle
            || $newData->text
            || $newData->link
            || $newData->image
        );

        return (object) [
            'acf_fc_layout' => $newData->acf_fc_layout,
            'hasContent' => $hasContent,
            'title' => $hasTitle ? $newData->section_title : '',
            'text' => $newData->text ?? '',
            'link' => is_array($newData->link) ? (object) $newData->link : false,
            'image' => $newData->image ? wp_get_attachment_image( $newData->image['ID'], 'full' ) : '',
            'orderClass' => $newData->layout === 'image_first' ? 'order-md-1' : 'order-md-2'
        ];
    }   
    
    public static function cms_text_with_button( $data )
    {   
        return (object) $data;
    }     

    public static function cms_three_promo( $data )
    {   
        return (object) $data;
    }  
    
    public static function cms_usp( $data )
    {   
        // Get Default USP from sitewide
        if(empty($data['usp'])) {
            $data['usp'] = self::defaultUsp();
        }

        // Convert USP items to object
        $data['usp'] = array_map(function($item) {
            return (object) $item;
        }, $data['usp'] );

        return $data;
    }
    
    // Delete this after dev
    public static function pr($data) {
        echo '<pre>';   
        var_dump( $data );
        echo '</pre>';
    } 
}