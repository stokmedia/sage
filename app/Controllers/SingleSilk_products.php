<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use App\Classes\Product;
use App\Classes\Helper;

class SingleSilk_products extends Controller
{

	use Partials\ProductData;

	public function productClass()
	{
		return new Product( get_post()->ID );
	}

	public function productBackgroundImage()
	{	
		$backgroundImage = Helper::localize( 'product_background_image' );

		return $backgroundImage ? wp_get_attachment_image_url( $backgroundImage['ID'], 'medium' ) : '';
	}

	public function productInformation()
	{
		$product = $this->productClass();
		$infos = [];

		// Description
		$descriptionLabel = Helper::localize( 'product_description_label' );
		if ($product->product_meta['description']) {
			array_push( $infos, [ 
				'label' => $descriptionLabel ? $descriptionLabel : 'Description', 
				'content' => $product->product_meta['description']
			]);
		}

		// Details
		$detailsLabel = Helper::localize( 'product_details_label' );
		if ($product->product_meta['excerpt']) {
			array_push( $infos, [ 
				'label' => $detailsLabel ? $detailsLabel : 'Details', 
				'content' => $product->product_meta['excerpt']
			]);
		}
		
		// Shipping
		$shippingLabel = Helper::localize( 'product_shipping_label' );
		$shippingContent = Helper::localize( 'product_shipping_content' );

		if ($shippingContent) {
			array_push( $infos, [ 
				'label' => $shippingLabel ? $shippingLabel : 'Shipping & Delivery', 
				'content' => $shippingContent
			]);
		}

		return array_map( function ( $info ) {
            return (object) $info;
        }, $infos );
	}

	public function productCategories()
	{
		$product = $this->productClass();
		$categories = wp_list_pluck( wp_get_post_terms( get_post()->ID, 'silk_category' ), 'name' );
		$categories = array_slice( $categories, 0, 2 );

		if ($product->product_meta['variantName']) {
			array_push( $categories, $product->product_meta['variantName'] );
		}

		return implode( '  |  ', $categories );
	}

}
