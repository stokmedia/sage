<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use App\Classes\Product;
use App\Classes\Breadcrumbs;
use App\Classes\Helper;

class TaxonomySilk_category extends Controller
{

    use Partials\ProductData;

    // private $itemPerPage = get_field('settings_product_listing_count', 'global');

    public static function title()
    {
        return get_post()->post_title;
    }
    
    public function translation()
    {
        $lang = Helper::current_lang();
        $productListing = get_field( 'translate_product_listing', $lang );
        return (object) $productListing;
    }

    public function content()
    {
        $postID = Helper::get_acf_term_id();

        return !empty($postID) ? App::get_content( $postID, 1 ) : false;
	}     

	public function breadcrumbs()
	{
        $breadcrumbs = new Breadcrumbs();

        return $breadcrumbs->render_breadcumbs( [
            'container_tag'     => 'div',
            'container_class'   => 'breadcrumb bg-white d-lg-inline-block d-none mb-0 ',
            'template'          => '<a class="breadcrumb-item" href="{link}">{title}</a>',
            'template_active'   => '<span class="breadcrumb-item active">{title}</span>',
		]);
	}    

    public function showLoadMoreButton()
    {
        global $wp_query;
        $productListingCount = get_field('settings_product_listing_count', 'global');
        if (!empty($productListingCount) && $wp_query->found_posts > $productListingCount) {
            return true;
        }

        return false;
    }

    public function ajaxUrlListing()
    {
        $productListingCount = get_field('settings_product_listing_count', 'global');
        $productListingCount = (!empty($productListingCount)) ? $productListingCount : '-1';
        $filterData = $this->filterData();
        $queryString = '';
        if (is_array($filterData)) {
            foreach ($filterData as $key => $val) {
                $separator = (!empty($queryString)) ? '&' : '';
                if (is_array($val)) {
                    foreach ($val as $skey => $sval) {
                        $separator = (!empty($queryString)) ? '&' : '';
                        $queryString .= $separator.'filters['.$key.'][]='.$sval;
                    }
                } else {
                    $queryString .= $separator.'filters['.$key.']='.$val;
                }
            }

            // add & separator for per_page
            $queryString .= '&';
        }

        $url = site_url().'/wp-json/wp/v2/products?'.$queryString.'per_page='.$productListingCount;
        return $url;
    }

    public function currentCategory()
    {
        return get_queried_object();
    }

    public function currentCategoryUrl()
    {
        return get_term_link(get_queried_object()->term_id);
    }

    public function filterData()
    {
        return (isset($_GET['filters'])) ? $_GET['filters'] : '';
    }

    public function productSize()
    {
        $market = $_SESSION['esc_store']['market'];
        $termId = get_queried_object()->term_id;
        $size = get_term_meta($termId, 'category_sizes_'.$market);
        // $size = get_option('product_sizes');
        if (isset($size[0]) && is_array($size[0])) {
            $size = $size[0];
        }
        
        return  $size;
    }

    public function productColor()
    {
        $termId = get_queried_object()->term_id;
        // This will reArrange Colors
        // So that All colors will be list first
        // before listing patterns
        $arrColors = array();
        $arrPattern = array();
        $colors = get_option('product_colors');
        $colors = get_term_meta($termId, 'category_colors');
        if (isset($colors[0]) && is_array($colors[0])) {
            $colors = $colors[0];
            foreach ($colors as $key => $val) {
                $val['slug'] = str_replace(' ', '-', strtolower($val['Name']));
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
        $termList = array();
        $term = get_queried_object();
        $term_children = get_term_children($term->term_id, 'silk_category');
        foreach ( $term_children as $key => $child ) {
            $term = get_term_by( 'id', $child, 'silk_category' );
            $termList[$key] = $term;
        }
        return $termList;
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
            'image' => $image ?? '',
            'image_mobile' => $imageMobile ?? '',
        ];
    }
}