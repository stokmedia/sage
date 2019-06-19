<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use App\Classes\Product;

class TaxonomySilk_category extends Controller
{

	use Partials\ProductData;

    public static function title()
    {
        return get_post()->post_title;
    }

    public function productSize()
    {
        return  get_option('product_sizes');
    }

    public function productColor()
    {
        // This will reArrange Colors
        // So that All colors will be list first
        // before listing patterns
        $arrColors = array();
        $arrPattern = array();
        $colors = get_option('product_colors');
        if (is_array($colors)) {
            foreach ($colors as $key => $val) {
                if (!empty($val['Hex'])) {
                    $arrColors[$key] = $val;
                } else {
                    $arrPattern[$key] = $val;
                }
            }
        }
        return array_merge($arrColors, $arrPattern);
    }

    public function categoryList()
    {
        $attributes = array(
            'taxonomy' => 'silk_category',
            'orderby' => 'name',
            'order' => 'asc'
        );
        // return pr( get_terms($attributes) );
        return get_terms($attributes);
    }

    public function heroBanner()
    {
        $term = get_queried_object();
        $acfId = $term->taxonomy .'_'. $term->term_id;
        $heroBanner = get_field( 'hero_banner_content', $acfId );
        $image = null;
        $imageMobile = null;

        if( !empty($heroBanner['image']) ) {
            $image = wp_get_attachment_image_url( $heroBanner['image']['ID'], 'category-banner' );
            $imageMobile = wp_get_attachment_image_url( $heroBanner['image']['ID'], 'category-banner-mobile' );
        }

        if( !empty($heroBanner['image_mobile']) ) {
            $imageMobile = wp_get_attachment_image_url( $heroBanner['image_mobile']['ID'], 'category-banner-mobile' );
        }   

        return (object) [
            'title' => $term->name,
            'text' => $term->description,
            'image' => $image,
            'image_mobile' => $imageMobile,
        ];
    }

    public function backgroundImage()
    {
        $term = get_queried_object();
        $acfId = $term->taxonomy .'_'. $term->term_id;
        $backgroundImage = get_field( 'background_image', $acfId );

        if( !empty($backgroundImage['image']) ) {
            $image = wp_get_attachment_image_url( $backgroundImage['image'], 'category-banner' );
            $imageMobile = wp_get_attachment_image_url( $backgroundImage['image'], 'category-banner-mobile' );
        }

        if( !empty($backgroundImage['image_mobile']) ) {
            $imageMobile = wp_get_attachment_image_url( $backgroundImage['image_mobile'], 'category-banner-mobile' );
        }
        
        return (object) [
            'title' => $term->name,
            'text' => $term->description,
            'image' => $image,
            'image_mobile' => $imageMobile,
        ];
    }
}