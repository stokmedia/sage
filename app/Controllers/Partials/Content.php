<?php

namespace App\Controllers\Partials;


use App\Classes\VideoHelper;
use App\Classes\Helper;
use App\Classes\SectionHelper;

trait Content
{
    public function content()
    {
        return self::get_content();
    }

    /**
     * Get page sections
     *
     * @param $postID int - ID where to get the sections
     * @param $sectionID int - Section starting value
     * @return object 
     */
    public static function get_content( $postID=null, $sectionID=0 )
    {
        $data = [];

        if( empty(get_post()->ID) && empty($postID) ) {
            return $data;
        }

        $flexibleContent = get_field( 'sections', $postID );

        if ( !$flexibleContent ) {
            return $data;
        }

        // Set initial section id
        $id = $sectionID;

        foreach ( $flexibleContent as $key => $content ) {
            $functionName = 'cms_' . str_replace( '-', '_', $content[ 'acf_fc_layout' ] );

            if ( method_exists( __CLASS__, $functionName ) ) {
                $id++;
                $content['id'] = $id;
                $thisContent = (object) self::$functionName( $content );

                if ( !empty( $thisContent ) ) {
                    $thisContent->id = $id;
                    $thisContent->is_h1 = $id === 1;
                    $thisContent->classes = SectionHelper::section_layout_classes( 
                        $thisContent, 
                        $key, 
                        $flexibleContent,
                        count($flexibleContent) + $sectionID
                    );

                    array_push( $data, $thisContent );
                }
            }
        }

        return $data;
    }

    public static function cms_hero_banner( $data )
    {
        $newData = (object)$data;
        $lazyClass = '';

        if ($newData->id != 1) {
            $lazyClass = ' lazy';
        }

        $hasContent = true;
        $image = null;
        $imageMobile = null;
        $imgAttr = [
            'class' => 'hero-image'.$lazyClass,
            'width' => null,
            'height' => null
        ];

        $title = SectionHelper::has_title( $newData ) ? $newData->section_title : '';

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
        
        $playOnMobile = [ 'data-showonmobile="true"' ];
        $hasContent = ($title || $newData->text || $newData->link);
        $isVideoMp4 = (strpos( $newData->video_url, '.mp4' ) !== false);
        $isVimeoExternal = strpos( $newData->video_url, 'vimeo' ) !== false && strpos( $newData->video_url, 'external' ) !== false;
        $isVideoTag = $isVideoMp4 || $isVimeoExternal;
        $buttonClass = '';

        // iframe embedded videos with content
        if ($hasContent && !$isVideoTag) {
            $buttonClass = 'd-none d-sm-none d-md-flex';
            $playOnMobile = [ 'data-showonmobile="false"' ];
        
        // If video is set to autoplay
        } elseif ($newData->is_autoplay) {
            $buttonClass = 'd-flex d-sm-flex d-md-none';

            if ( $isVideoTag ) {
                $buttonClass = 'd-none';
            }
        
        // Video tags with content
        } elseif ($isVideoTag && $hasContent && !$newData->is_autoplay) {
            $buttonClass = 'd-none d-sm-none d-md-flex';
            $playOnMobile = [ 'data-showonmobile="false"' ];
        }

        $isBackground = false;
        if ($newData->is_autoplay) {
            $isBackground = true;
        }

        return (object)[
            'acf_fc_layout' => $newData->acf_fc_layout,
            'title' => $title,
            'show_title' => $newData->show_section_title,
            'text' => $newData->text ?? '',
            'link' => is_array( $newData->link ) ? (object)$newData->link : false,
            'image' => $image,
            'image_mobile' => $imageMobile,
            'is_autoplay' => $newData->is_autoplay,
            'play_button_class' => $buttonClass,
            'video_tag' => !empty($newData->video_url) ? VideoHelper::getVideoTag( $newData->video_url, true, false, $newData->is_autoplay, $newData->is_autoplay, $isBackground, '', $playOnMobile ) : null,
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

        $original = SectionHelper::get_instagram_data( [
            'posts_per_page' => $imageCount,
            'ignore_sticky_posts' => 1,
            'tax_query' => $taxQuery ?? []
        ] );

        // Add filler if original images is less than the $imageCount value
        if ( count( $original ) < $imageCount ) {
            $fill = SectionHelper::get_instagram_data( [
                'posts_per_page' => $imageCount - count( $original ),
                'ignore_sticky_posts' => 1,
                'post__not_in' => $original
            ] );
        }

        $allIDs = array_merge( $original, ( $fill ?? [ ]) );
        $instaImages = array_map( function ( $id ) {
            return (object)[
                'image_small' => wp_get_attachment_image_url( get_post_thumbnail_id( $id ), 'square-small lazy' ),
                'image_large' => wp_get_attachment_image_url( get_post_thumbnail_id( $id ), 'large lazy' ),
                'link' => get_post_meta( $id, 'instagram_link', true )
            ];
        }, $allIDs );

        $instagramLinkIndex = array_search( 'instagram', array_column( self::getSocialLinks(), 'media' ) );
        if ( $instagramLinkIndex ) {
            $instagramLink = [
                'title' => self::getSiteTranslations()->general['follow_us'] ?? '',
                'url' => self::getSocialLinks()[ $instagramLinkIndex ]['url'],
                'target' => '_blank'
            ];
        }

        return (object)[
            'acf_fc_layout' => $data->acf_fc_layout,
            'instagram_images' => $instaImages,
            'instagram_link' => (object)$instagramLink ?? [ ],
            'title' => SectionHelper::has_title( $data ) ? $data->section_title : '',
            'text' => $data->text,
            'image' => $data->image ? wp_get_attachment_image_url( $data->image[ 'ID' ], 'instagram-bg' ) : '',
        ];
    }

    public static function cms_newsletter_signup( $data )
    {
        $data = (object)$data;
        $data->title = SectionHelper::has_title( $data ) ? $data->section_title : '';
        $data->link = (object) (!empty($data->link) ? $data->link : []);
        $data->has_content = ( !empty($data->title) || !empty($data->preamble) || !empty($data->content) || !empty($data->link) );
        $data->image = $data->image ? wp_get_attachment_image_url( $data->image[ 'ID' ], 'newsletter' ) : null;

        return (object)$data;
    }

    public static function cms_popular_products( $data )
    {
        $newData = (object)$data;
        $products = [];

        if ( $newData->section_displays === 'handpick' ) {
            $products = $newData->handpicked_products;

        } else {
            $postType = 'silk_products';
            $taxonomy = 'silk_category';

            // Related posts
            if( $newData->section_displays === 'related' ) {
                if( is_single() && get_post_type() === $postType ) {
                    $postTerms = wp_get_post_terms( get_the_ID(), $taxonomy );
                    $category = $postTerms ? end($postTerms)->term_id : null;
                    $category = $category;
                } else {
                    $category = null;
                }

            } else {
                $category = $newData->category;
            }

            $args = [
                'post_type' => $postType,
                'post_status' => 'publish',
                'posts_per_page' => $newData->count ? $newData->count : -1,
            ];

            // Category filter
            if ($category) {
                $args['tax_query'] = [[
                    'taxonomy' => $taxonomy,
                    'field' => 'term_id',
                    'terms' => $category,
                ]];
            }            

            if ( $newData->items_to_display === 'random' ) {
                $args[ 'orderby' ] = 'rand';
            } else {
                $args['meta_key'] = 'product_order';
                $args['orderby'] = 'meta_value_num';
                $args['order'] = 'ASC';                
            }

            $posts = new \WP_query( $args );
            $products = $posts->posts;
        }

        $hasContent = (
            SectionHelper::has_title( $newData )
            || $newData->preamble
            || $products
            || $newData->link
        );

        return (object)[
            'acf_fc_layout' => $newData->acf_fc_layout,
            'has_content' => $hasContent,
            'title' => SectionHelper::has_title( $newData ) ? $newData->section_title : '',
            'preamble' => $newData->preamble ?? '',
            'products' => $products,
            'product_count' => count( $products ),
            'link' => is_array( $newData->link ) ? (object)$newData->link : false,
        ];
    }

    public static function cms_promo_boxes( $data )
    {
        $newData = (object)$data;

        $items = SectionHelper::get_promo_data( $newData );

        // Add lazy load class
        foreach ($items as $key => $item) {
            $items[$key]->image = str_replace(array('class="', 'src="'), array('class="lazy ', 'data-src="'), $item->image);
        }

        return (object)[
            'acf_fc_layout' => $newData->acf_fc_layout,
            'items' => $items
        ];
    }

    public static function cms_text_and_image( $data )
    {
        $newData = (object)$data;
        $hasContent = ( SectionHelper::has_title( $newData )
            || $newData->text
            || $newData->link
            || $newData->image
        );

        return (object)[
            'acf_fc_layout' => $newData->acf_fc_layout,
            'hasContent' => $hasContent,
            'title' => SectionHelper::has_title( $newData ) ? $newData->section_title : '',
            'text' => $newData->text ?? '',
            'link' => is_array( $newData->link ) ? (object)$newData->link : false,
            'image' => $newData->image ? wp_get_attachment_image_url( $newData->image[ 'ID' ], 'large' ) : '',
            'orderClass' => $newData->layout === 'image_first' ? 'order-md-1' : 'order-md-2'
        ];
    }

    public static function cms_text_with_button( $data )
    {
        $data = (object)$data;
        $data->title = SectionHelper::has_title( $data ) ? $data->section_title : '';
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

        $items = SectionHelper::get_promo_data( $newData );

        return (object)[
            'acf_fc_layout' => $newData->acf_fc_layout,
            'title' => SectionHelper::has_title( $newData ) ? $newData->section_title : '',
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
        $newData = (object) $data;

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
            'title' => SectionHelper::has_title( $newData ) ? $newData->section_title : '',
            'preamble' => $newData->preamble,
            'items' => $newData->content,
            'count' => $newData->count,
            'view_all_btn' => self::getSiteTranslations()->general['view_all'] ?? ''
        ];
    }
}