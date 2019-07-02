<?php

namespace App\Classes;

class SectionHelper
{

    public static function has_title( $data )
    {
        return ( !empty($data->section_title) && !empty($data->show_section_title) );
    }    

    public static function get_promo_data( $data )
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
                'target' => '',
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

    public static function get_instagram_data( $options = [] )
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

    public static function section_layout_classes( $currentSection, $pos, $sections, $count )
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
        $isLast = ($currentSection->id === $count);

        // Check if current section in $sectionsWithNoBottomAdjustment
        $isSectionsWithNoBottomAdjustment = in_array( $current, $sectionsWithNoBottomAdjustment );

        // Check if current section in $sectionsWithNoBottomAdjustment
        $nextSectionHasBg = in_array( $nextSection, $sectionsWithBg ); 
        
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

}