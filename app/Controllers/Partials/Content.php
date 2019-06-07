<?php

namespace App\Controllers\Partials;

trait Content
{
    public function content()
    {
        $data = [ ];

        $flexibleContent = get_field( 'sections' );

        if ( $flexibleContent ) {
            foreach ( $flexibleContent as $content ) {
                $functionName = 'cms_' . str_replace( '-', '_', $content[ 'acf_fc_layout' ] );

                if ( method_exists( $this, $functionName ) ) {
                    $thisContent = (object)self::$functionName( $content );

                    if ( !empty( $thisContent ) ) {
                        array_push( $data, $thisContent );
                    }
                }
            }
        }
        return $data;
    }

    public static function cms_hero_banner( $data )
    {
        return (object)$data;
    }

    public static function cms_instagram_grid( $data )
    {
        return (object)$data;
    }

    public static function cms_newsletter_signup( $data )
    {
        return (object)$data;
    }

    public static function cms_newsletter( $data )
    {
        return (object)$data;
    }

    public static function cms_popular_products( $data )
    {
        return (object)$data;
    }

    public static function cms_promo_boxes( $data )
    {
        return (object)$data;
    }

    public static function cms_text_and_image( $data )
    {
        $newData = (object)$data;
        $hasTitle = ( $newData->section_title && $newData->show_section_title );
        $hasContent = ( $hasTitle
            || $newData->text
            || $newData->link
            || $newData->image
        );

        return (object)[
            'acf_fc_layout' => $newData->acf_fc_layout,
            'hasContent' => $hasContent,
            'title' => $hasTitle ? $newData->section_title : '',
            'text' => $newData->text ?? '',
            'link' => is_array( $newData->link ) ? (object)$newData->link : false,
            'image' => $newData->image ? wp_get_attachment_image( $newData->image[ 'ID' ], 'full' ) : '',
            'orderClass' => $newData->layout === 'image_first' ? 'order-md-1' : 'order-md-2'
        ];
    }

    public static function cms_text_with_button( $data )
    {
        return (object)$data;
    }

    public static function cms_three_promo( $data )
    {
        $newData = (object)$data;
        $hasTitle = ( $newData->section_title && $newData->show_section_title );
        $items = [ ];

        foreach ( $newData->items as $item ) {
            $item = (object)$item;

            $cardImageSize = 'large';
            $postImage = null;
            $postTitle = null;
            $postText = null;
            $postLink = (object)[
                'url' => null,
                'title' => $newData->item_link_text,
                'target' => '_blank',
            ];

            if ( $item->get_content_from === 'category' && $item->category ) {
                $categoryImage = get_field( 'featured_image', $item->category->taxonomy . '_' . $item->category->term_id );
                $postImage = $categoryImage ? wp_get_attachment_image( $categoryImage[ 'ID' ], 'full' ) : null;
                $postTitle = $item->category->name;
                $postText = $item->category->description;
                $postLink->url = get_term_link( $item->category, $item->category->taxonomy );

            } elseif ( $item->get_content_from === 'post' && $item->post ) {
                $postImage = has_post_thumbnail( $item->post ) ? get_the_post_thumbnail( $item->post->ID, $cardImageSize ) : null;
                $postTitle = $item->post->post_title;
                $postText = $item->post->post_content;
                $postLink->url = get_permalink( $item->post->ID );
            }

            $itemLink = !empty( $item->link ) ? (object)$item->link : $postLink;

            if ( empty( $itemLink->title ) ) {
                $itemLink->title = $newData->item_link_text;
            }

            $newItem = [
                'image' => !empty( $item->image ) ? wp_get_attachment_image( $item->image[ 'ID' ], 'full' ) : $postImage,
                'title' => !empty( $item->title ) ? $item->title : $postTitle,
                'text' => !empty( $item->text ) ? $item->text : wp_trim_words( $postText, 50 ),
                'link' => $itemLink,
            ];

            if ( empty( array_filter( $newItem ) ) ) {
                continue;
            }

            array_push( $items, (object)$newItem );
        }

        return (object)[
            'acf_fc_layout' => $newData->acf_fc_layout,
            'title' => $hasTitle ? $newData->section_title : '',
            'items' => $items
        ];
    }

    public static function cms_usp( $data )
    {
        // Get Default USP from sitewide
        if ( empty( $data[ 'usp' ] ) ) {
            $data[ 'usp' ] = self::defaultUsp();
        }

        // Convert USP items to object
        $data[ 'usp' ] = array_map( function ( $item ) {
            return (object)$item;
        }, $data[ 'usp' ] );

        return $data;
    }

    // Delete this after dev
    public static function pr( $data )
    {
        echo '<pre>';
        var_dump( $data );
        echo '</pre>';
    }

    // this also
    public static function cl( $data )
    {
        echo '<script>console.log(' . json_encode( $data ) . ')</script>';
    }
}