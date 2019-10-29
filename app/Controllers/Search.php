<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use App\Classes\Product;
use App\Classes\Breadcrumbs;
use App\Classes\Helper;
use App\Controllers\TaxonomySilk_category;
use App\Classes\SectionHelper;

class Search extends Controller
{

    use Partials\ProductData;

    
    public static function title()
    {
        return get_post()->post_title;
    }
    
    public function searchKeyword()
    {
        return urldecode( get_query_var('s') );
    }
    
    public function translation()
    {
        $lang = Helper::current_lang();
        $productListing = get_field( 'translate_product_listing', $lang );
        return (object) $productListing;
    }

    public function searchCount()
    {
        global $wp_query;
        return $wp_query->found_posts;
    }

    public function searchHeader()
    {
        global $wp_query;

        $lang = Helper::current_lang();
        $title = get_field( 'search_page_title', $lang );
        $resultText = get_field( 'search_result_text', $lang );

        // Parse search title
        $searchTitle = Helper::sp_render_text( [
            'search-keyword' => $wp_query->query_vars['s'],
        ], $title );        

        // Parse search result text
        $searchText = Helper::sp_render_text( [
            'result-count' => $this->searchCount()
        ], $resultText );

        return (object) [
            'title' => $searchTitle,
            'result_text' => $searchText
        ];
    }

    public function content()
    {
        if ($this->searchCount() < 1) {
            // Get Search page
            $postID = get_field( 'search_has_no_result', Helper::current_lang() );

            // echo '<pre>'; print_r( get_fields( Helper::current_lang() ) ); echo '</pre>';
            return App::get_content($postID);
        }
    }

	public function titleBreadcrumbs()
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

        $lang = Helper::current_lang();
        $queryLang = '';
        if (!empty($lang)) {
            $queryLang = '&lang='.$lang;
        }

        $url = site_url().'/wp-json/wp/v2/products?'.$queryString.'per_page='.$productListingCount.$queryLang;
        return $url;        

        // $url = site_url().'/wp-json/wp/v2/products?'.$queryString.'per_page='.$productListingCount;
        // return $url;
    }

    public function filterData()
    {
        return (isset($_GET['filters'])) ? $_GET['filters'] : '';
    }

    public function productSize()
    {
        $size = get_option('product_sizes');
        if (isset($size) && is_array($size)) {
            $size = $size;
        }
        
        return  $size;
    }

    public function productColor()
    {
        // This will reArrange Colors
        // So that All colors will be list first
        // before listing patterns
        $arrColors = array();
        $arrPattern = array();
        $colors = get_option('product_colors');
        if (isset($colors) && is_array($colors)) {
            foreach ($colors as $key => $val) {
                $val['slug'] = strtolower($val['Name']);
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
        $termList = get_terms(['taxonomy' => 'silk_category', 'parent' => 0]);
        return $termList;
    }

    public function backgroundImage()
    {
        $backgroundImage = get_field( 'search_background_image', Helper::current_lang() );

        if( !empty($backgroundImage['image']) ) {
            $image = wp_get_attachment_image_url( $backgroundImage['image'], 'category-banner' );
            $imageMobile = wp_get_attachment_image_url( $backgroundImage['image'], 'category-banner-mobile' );
        }

        if( !empty($backgroundImage['image_mobile']) ) {
            $imageMobile = wp_get_attachment_image_url( $backgroundImage['image_mobile'], 'category-banner-mobile' );
        }
        
        return (object) [
            'image' => $image ?? '',
            'image_mobile' => $imageMobile ?? '',
        ];
    }
}