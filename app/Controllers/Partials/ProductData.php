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
		$data->sizes_available = $product->sizesAvailable();
		$data->product_meta = (object) $product->product_meta;
		$data->display_price = self::get_display_price( $data->price );
		$data->is_sold_out = self::is_sold_out( $postID ) || $data->sizes_available === 0;
		$data->is_pre_order = self::isPreOrder( $postID );
		
		// Product colors
		$colors = $product->getProductColors( 'variant' );
		if (!empty($colors)) {
			$data->colors = self::get_product_colors( $colors );
		} 

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

	public static function get_product_colors( $colors )
	{
		if( empty($colors) || !is_array($colors) ) {
			return;
		}

		$productColors = [];

		foreach ($colors as $color) {
			$tempColor = (object) [];
			$tempColor->product = $color['product'];
			$tempColor->variant = $color['variantName'];			
			$tempColor->product_uri = $color['productUri'];
			
			// Get swatch style
			$swatch = (object) [];
			if (!empty($color['swatch'])) {
				if (!empty($color['swatch']['image'])) {
					$background = 'background-image: url(' .  $color['swatch']['image']['url'] .')';
					$isImage = true;
				} else {
					$background = 'background-color: ' .  $color['swatch']['hex'];
					$isImage = false;
				}

				$swatch->desc = $isImage ? $color['variantName'] : $color['swatch']['desc'];
				$swatch->background = $background;
				$swatch->is_image = $isImage;
			}

			$tempColor->swatch = $swatch;

			array_push( $productColors, $tempColor );
		}

		return $productColors;
		
	}

	public static function is_sold_out( $postID )
	{	
		$isAvailable = \EscGeneral::isAvailable( $postID );

		return !empty($isAvailable[ 'info' ]) ? ($isAvailable[ 'info' ][ 'stockOfAllItems' ] === 0) : false;
	}

	public static function isPreOrder($postID)
	{
		$availability = \EscGeneral::isAvailable($postID);
		if ($availability['success'] && isset($availability['info']['stockOfAllItems']) && $availability['info']['stockOfAllItems'] === 'infinite') {
			return true;
		}
		return false;
	}

}