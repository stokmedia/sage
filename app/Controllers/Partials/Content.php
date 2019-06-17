<?php

namespace App\Controllers\Partials;


use App\Classes\VideoHelper;
use App\Classes\Helper;

trait Content
{
    public function content()
    {
        $data = [ ];

        $flexibleContent = get_field( 'sections' );

        if ( !$flexibleContent ) {
            return $data;
        }

        foreach ( $flexibleContent as $key => $content ) {
            $functionName = 'cms_' . str_replace( '-', '_', $content[ 'acf_fc_layout' ] );

            if ( method_exists( $this, $functionName ) ) {
                $thisContent = (object)self::$functionName( $content );

                if ( !empty( $thisContent ) ) {
                    $thisContent->id = $key + 1;
                    $thisContent->is_h1 = $key === 0;
                    $thisContent->classes = self::section_layout_classes( 
                        $thisContent, 
                        $key, 
                        $flexibleContent
                    );

                    array_push( $data, $thisContent );
                }
            }
        }

        return $data;
    }

    public static function hasTitle( $data )
    {
        return ( $data->section_title && $data->show_section_title );
    }

    public static function getPromoData( $data )
    {
        $items = [ ];

        if ( empty( $data->items ) ) {
            return $items;
        }

        foreach ( $data->items as $item ) {
            $item = (object)$item;

            $cardImageSize = 'medium';
            $postImage = null;
            $postTitle = null;
            $postText = null;
            $postPreHeader = null;
            $postLink = (object)[
                'url' => null,
                'title' => $data->item_link_text ?? '',
                'target' => '_blank',
            ];

            if ( $item->get_content_from === 'category' && $item->category ) {
                $categoryImage = get_field( 'featured_image', $item->category->taxonomy . '_' . $item->category->term_id );
                $postImage = $categoryImage ? wp_get_attachment_image( $categoryImage[ 'ID' ], $cardImageSize ) : null;
                $postTitle = $item->category->name;
                $postText = $item->category->description;
                $postLink->url = get_term_link( $item->category, $item->category->taxonomy );


            } elseif ( $item->get_content_from === 'post' && $item->post ) {
                $postImage = has_post_thumbnail( $item->post ) ? get_the_post_thumbnail( $item->post->ID, $cardImageSize ) : null;
                $postTitle = $item->post->post_title;
                $postText = $item->post->post_content;
                $postLink->url = get_permalink( $item->post->ID );

                if ( $data->acf_fc_layout === 'promo-boxes' && get_post_type( $item->post ) === 'post' ) {
                    $categoryNames = wp_list_pluck( get_the_category( $item->post->ID ), 'name' );
                    $postPreHeader = !empty( $categoryNames ) ? $categoryNames[ 0 ] : null;
                }

                $postPreHeader = null;
            }

            $itemLink = !empty( $item->link ) ? (object)$item->link : $postLink;

            if ( empty( $itemLink->title ) ) {
                $itemLink->title = $data->item_link_text ?? '';
            }

            $newItem = [
                'image' => !empty( $item->image ) ? wp_get_attachment_image( $item->image[ 'ID' ], $cardImageSize ) : $postImage,
                'title' => !empty( $item->title ) ? $item->title : $postTitle,
                'text' => !empty( $item->text ) ? $item->text : wp_trim_words( $postText, 50 ),
                'link' => $itemLink,
            ];

            if ( $data->acf_fc_layout === 'promo-boxes' ) {
                $newItem[ 'pre_header' ] = !empty( $item->pre_header ) ? $item->pre_header : $postPreHeader;
            }

            if ( empty( array_filter( $newItem ) ) ) {
                continue;
            }

            array_push( $items, (object)$newItem );
        }

        return $items;
    }

    public static function getInstagramData( $options = [ ] )
    {
        $args = array(
            'post_status' => 'publish',
            'post_type' => 'instagram',
            'orderby' => 'date',
            'order' => 'DESC',
        );

        if ( $options ) {
            foreach ( $options as $key => $item ) {
                $args[ $key ] = $item;
            }
        }

        $data = get_posts( $args );

        return wp_list_pluck( $data, 'ID' );
    }

    public static function cms_hero_banner( $data )
    {
        $newData = (object)$data;
        $hasContent = true;
        $image = null;
        $imageMobile = null;
        $imgAttr = [
            'class' => 'hero-image',
            'width' => null,
            'height' => null
        ];

        if ( $newData->image_desktop ) {
            $imgAttr[ 'class' ] = 'hero-image d-none d-sm-none d-md-block';
            $image = wp_get_attachment_image( $newData->image_desktop[ 'ID' ], 'hero-banner', false, $imgAttr );
            $imgAttr[ 'class' ] = 'hero-image d-block d-sm-block d-md-none';
            $imageMobile = wp_get_attachment_image( $newData->image_desktop[ 'ID' ], 'hero-banner-mobile', false, $imgAttr );
        }

        if ( $newData->image_mobile ) {
            $imgAttr[ 'class' ] = 'hero-image d-block d-sm-block d-md-none';
            $imageMobile = wp_get_attachment_image( $newData->image_mobile[ 'ID' ], 'hero-banner-mobile', false, $imgAttr );
        }

        return (object)[
            'acf_fc_layout' => $newData->acf_fc_layout,
            'title' => self::hasTitle( $newData ) ? $newData->section_title : '',
            'show_title' => $newData->show_section_title,
            'text' => $newData->text ?? '',
            'link' => is_array( $newData->link ) ? (object)$newData->link : false,
            'image' => $image,
            'image_mobile' => $imageMobile,
//            'video_url' => $newData->video_url,
//            'is_autoplay' => $newData->is_autoplay,
            'video_tag' => !empty($newData->video_url) ? VideoHelper::getVideoTag( $newData->video_url, true, false, $newData->is_autoplay ) : null,
        ];
    }

    public static function cms_instagram_grid( $data )
    {
        $data = (object)$data;
        $imageCount = 13;

        if ( $hashtags = $data->filter_by_hashtag ) {
            $taxQuery = [
                'taxonomy' => 'hashtag',
                'field' => 'term_id',
                'terms' => $hashtags,
            ];
        }

        $original = self::getInstagramData( [
            'posts_per_page' => $imageCount,
            'ignore_sticky_posts' => 1,
            'tax_query' => $taxQuery ?? []
        ] );

        // Add filler if original images is less than the $imageCount value
        if ( count( $original ) < $imageCount ) {
            $fill = self::getInstagramData( [
                'posts_per_page' => $imageCount - count( $original ),
                'ignore_sticky_posts' => 1,
                'post__not_in' => $original
            ] );
        }

        $allIDs = array_merge( $original, ( $fill ?? [ ]) );
        $instaImages = array_map( function ( $id ) {
            return (object)[
                'image_small' => wp_get_attachment_image( get_post_thumbnail_id( $id ), 'square-small' ),
                'image_large' => wp_get_attachment_image( get_post_thumbnail_id( $id ), 'large' ),
                'link' => get_post_meta( $id, 'instagram_link', true )
            ];
        }, $allIDs );

        $instagramLinkIndex = array_search( 'instagram', array_column( self::getSocialLinks(), 'media' ) );
        if ( $instagramLinkIndex ) {
            $instagramLink = [
                'title' => get_field( 'translate_follow_us', self::currentLang() ),
                'url' => self::getSocialLinks()[ $instagramLinkIndex ][ 'url' ],
                'target' => '_blank'
            ];
        }

        return (object)[
            'acf_fc_layout' => $data->acf_fc_layout,
            'instagram_images' => $instaImages,
            'instagram_link' => (object)$instagramLink ?? [ ],
            'title' => self::hasTitle( $data ) ? $data->section_title : '',
            'text' => $data->text,
            'image' => $data->image ? wp_get_attachment_image_url( $data->image[ 'ID' ], 'instagram-bg' ) : '',
        ];
    }

    public static function cms_newsletter_signup( $data )
    {
        $data = (object)$data;
        $data->title = self::hasTitle( $data ) ? $data->section_title : '';
        $data->link = (object) (!empty($data->link) ? $data->link : []);
        $data->has_content = ( !empty($data->title) || !empty($data->preamble) || !empty($data->content) || !empty($data->link) );
        $data->image = $data->image ? wp_get_attachment_image_url( $data->image[ 'ID' ], 'newsletter' ) : null;

        return (object)$data;
    }

    public static function cms_popular_products( $data )
    {
        $newData = (object)$data;
        $products = [ ];

        if ( $newData->section_displays === 'handpick' ) {
            $products = $newData->handpicked_products;

        } else {
            $args = [
                'post_type' => 'silk_products',
                'post_status' => 'publish',
                'posts_per_page' => $newData->count ? $newData->count : -1,
                'tax_query' => [
                    [
                        'taxonomy' => 'silk_category',
                        'field' => 'term_id',
                        'terms' => $newData->category,
                    ]
                ]
            ];

            if ( $newData->items_to_display === 'random' ) {
                $args[ 'orderby' ] = 'rand';
            } else {
                $args[ 'orderby' ] = 'date';
                $args[ 'order' ] = 'DESC';
            }

            $products = get_posts( $args );
        }

        $hasContent = (
            self::hasTitle( $newData )
            || $newData->preamble
            || $products
            || $newData->link
        );

        return (object)[
            'acf_fc_layout' => $newData->acf_fc_layout,
            'has_content' => $hasContent,
            'title' => self::hasTitle( $newData ) ? $newData->section_title : '',
            'preamble' => $newData->preamble ?? '',
            'products' => $products,
            'product_count' => count( $products ),
            'link' => is_array( $newData->link ) ? (object)$newData->link : false,
        ];
    }

    public static function cms_promo_boxes( $data )
    {
        $newData = (object)$data;

        $items = self::getPromoData( $newData );

        return (object)[
            'acf_fc_layout' => $newData->acf_fc_layout,
            'items' => $items
        ];
    }

    public static function cms_text_and_image( $data )
    {
        $newData = (object)$data;
        $hasContent = ( self::hasTitle( $newData )
            || $newData->text
            || $newData->link
            || $newData->image
        );

        return (object)[
            'acf_fc_layout' => $newData->acf_fc_layout,
            'hasContent' => $hasContent,
            'title' => self::hasTitle( $newData ) ? $newData->section_title : '',
            'text' => $newData->text ?? '',
            'link' => is_array( $newData->link ) ? (object)$newData->link : false,
            'image' => $newData->image ? wp_get_attachment_image_url( $newData->image[ 'ID' ], 'large' ) : '',
            'orderClass' => $newData->layout === 'image_first' ? 'order-md-1' : 'order-md-2'
        ];
    }

    public static function cms_text_with_button( $data )
    {
        $data = (object)$data;
        $data->title = self::hasTitle( $data ) ? $data->section_title : '';
        $data->link = $data->link ? (object)$data->link : $data->link;
        $data->has_content = ( $data->title || $data->preamble || $data->content || $data->link );
        $data->content = Helper::sp_render_text( [
            'size_guide' => \App\template( 'partials.size-guide', [ 'size_guide' => self::getSizeGuideData() ] )
        ], $data->content );

        return $data;
    }

    public static function cms_three_promo( $data )
    {
        $newData = (object)$data;

        $items = self::getPromoData( $newData );

        return (object)[
            'acf_fc_layout' => $newData->acf_fc_layout,
            'title' => self::hasTitle( $newData ) ? $newData->section_title : '',
            'items' => $items
        ];
    }

    public static function cms_usp( $data )
    {
        // Get Default USP from sitewide
        if ( empty( $data[ 'usp' ] ) ) {
            $data[ 'usp' ] = self::getDefaultUsp();
        }

        // Convert USP items to object
        $data[ 'usp' ] = array_map( function ( $item ) {
            return (object)$item;
        }, $data[ 'usp' ] );

        return $data;
    }

    public static function cms_resellers( $data )
    {
        $newData = (object)$data;

        // Get reseller lists
        $resellers = self::getResellerLists();

        // Add items to $newData
        if ( $resellers ) {
            $newData->content[ 0 ] = (object)array(
                'label' => $newData->sweden_label,
                'posts' => (object)array_filter( array_map( function ( $post ) {
                    return ( strtolower( $post[ 'country' ] ) === 'sweden' ) ? $post : null;
                }, $resellers ) )
            );

            $newData->content[ 1 ] = (object)array(
                'label' => $newData->global_label,
                'posts' => (object)array_filter( array_map( function ( $post ) {
                    return ( strtolower( $post[ 'country' ] ) !== 'sweden' ) ? $post : null;
                }, $resellers ) )
            );

            $newData->content[ 2 ] = (object)array(
                'label' => $newData->agent_and_distributor_label,
                'posts' => (object)array_filter( array_map( function ( $post ) {
                    return ( !empty( $post[ 'is_agent' ] ) ) ? $post : null;
                }, $resellers ) )
            );
        }

        return (object)[
            'acf_fc_layout' => $newData->acf_fc_layout,
            'title' => self::hasTitle( $newData ) ? $newData->section_title : '',
            'preamble' => $newData->preamble,
            'items' => $newData->content,
            'count' => $newData->count,
            'view_all_btn' => get_field( 'translate_view_all', self::currentLang() )
        ];
    }

    public static function section_layout_classes( $currentSection, $pos, $sections )
    {
        $classes = [];
        $sectionLists = wp_list_pluck( $sections, 'acf_fc_layout' );

        $sectionsWithNoBottomAdjustment = [
            'hero-banner',
            'promo-boxes',
            'instagram-grid',
            'three-promo',
            'text-and-image',
            'usp',
        ];

        $sectionsWithPaddingTopAdjustment = [
            'text-with-button',
            'resellers'
        ]; 
        
        $sectionsWithSmallPaddingTopAdjustment = [
            'newsletter'
        ];
        
        $sectionsWithBg = array_merge( $sectionsWithNoBottomAdjustment, ['popular-products'] );

        // Get current section layout name
        $current = $currentSection->acf_fc_layout;

        // Get next section layout name
        $nextSection = Helper::get_array_value_by_index( $sectionLists, $pos + 1 );

        // Check if current section is the first section
        $isFirst = ($currentSection->id === 1);

        // Check if current section is the last section
        $isLast = ($currentSection->id === count($sections));

        // Check if current section in $sectionsWithNoBottomAdjustment
        $isSectionsWithNoBottomAdjustment = in_array( $current, $sectionsWithNoBottomAdjustment );

        // Check if current section in $sectionsWithNoBottomAdjustment
        $nextSectionHasBg = in_array( $nextSection, $sectionsWithBg );

        // Check if current section in $sectionsWithBg
        $isSectionWithBg = in_array( $current, $sectionsWithBg );   
        
        // Check if current section is newsletter
        $isNewsletter = ($current==='newsletter-signup');

        // Has padding top
        if ($isFirst && in_array($current, $sectionsWithPaddingTopAdjustment )) {
            array_push( $classes, 'has-pt' );
        
        // Has small padding top
        } elseif ($isFirst && in_array($current, $sectionsWithSmallPaddingTopAdjustment )) {
            array_push( $classes, 'has-small-pt' );
        }

        // No margin bottom
        if ( ($isLast && $isSectionsWithNoBottomAdjustment) || ($nextSectionHasBg && $isSectionsWithNoBottomAdjustment)) {
            array_push( $classes, 'no-mb' );
        
        // Has small margin bottom
        } elseif ( 
            $nextSection === 'newsletter-signup' // Next section is newsletter      
            || ($isLast && $isNewsletter) // Current section is newsletter and is last section
            || ($isNewsletter && in_array( $nextSection, $sectionsWithBg )) // Current section is newsletter and next section has BG
        ) {
            array_push( $classes, 'has-small-mb' );
        }

        return implode( ' ', $classes );
    }

    // Delete this after dev
    public static function pr( $data )
    {
        echo '<pre>';
        var_dump( $data );
        echo '</pre>';
    }
}