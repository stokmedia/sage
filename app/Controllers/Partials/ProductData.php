<?php

namespace App\Controllers\Partials;

use App\Classes\Product;

trait ProductData
{
    public static function get_product( $postID=null ) {

		if (empty($postID)) {
			$postID = get_post()->ID;
		}

    	$product = new Product( $postID );
    	
    	$data = (object) [];
    	$data->price = $product->getPrice();
    	$data->images = $product->getAllProductImages();
		$data->is_bundle = $product->isBundle();
		$data->colors = $product->getProductColors( 'variant' );
		$data->sizes_available = $product->sizesAvailable();
		$data->product_meta = (object) $product->product_meta;
		$data->display_price = self::get_display_price( $data->price );

        if( $product->isBundle() && is_single() ) {

            // TODO: Maybe needed?
            //var_dump(General::currentLang());

            $data->bundle = $product->getBundle();
        }

    	return $data;
	}

	public static function get_display_price( $priceInfo )
	{
		if( empty($priceInfo) || !is_array($priceInfo) ) {
			return;
		}

		$data = (object) [];
		$data->is_sale = false;
		$data->price = !empty( $priceInfo['info']['price'] ) ? $priceInfo['info']['price'] : '';
		$data->price_before = !empty( $priceInfo['info']['priceBeforeDiscount'] ) ? $priceInfo['info']['priceBeforeDiscount'] : '';

		// Check if price before is bigger than the product price
		$isOnSale = ($data->price_before && $data->price_before > $data->price );

		if ($priceInfo['success'] && (!empty($priceInfo['info']['showAsOnSale']) || $isOnSale)) {			
			$data->is_sale = true;
		}

		return $data;
	}

}