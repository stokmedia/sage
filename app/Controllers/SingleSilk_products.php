<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use App\Classes\Product;
use App\Classes\Helper;

class SingleSilk_products extends Controller
{

	use Partials\ProductData;

    public function content()
    {
        // Get selected product page
        $postID = get_field( 'settings_selected_product', Helper::current_lang() );

        return App::get_content( $postID, 1 );
    }  	

	public function productClass()
	{
		return new Product( get_post()->ID );
	}

	public function productBackgroundImage()
	{	
		$backgroundImage = Helper::localize( 'product_background_image' );

		return $backgroundImage ? wp_get_attachment_image_url( $backgroundImage['ID'], 'medium' ) : '';
	}

	public function productTranslations()
	{
		return !empty(App::getSiteTranslations()->selected_product) ? App::getSiteTranslations()->selected_product : [];
	}

	public function addtocartButton()
	{	
		$product = self::get_product();
		$translations = $this->productTranslations();

		if ($product->is_sold_out) {
			$buttonText = !empty($translations['product_states']['out_of_stock']) ? $translations['product_states']['out_of_stock'] : '';
			$buttonAttr = 'disabled';
		} else {
			$buttonText = !empty($translations['buy_button']) ? $translations['buy_button'] : '';
			$buttonAttr = '';
		}

		return (object) [
			'text' => $buttonText,
			'attr' => $buttonAttr
		];
	}

	public function productInformation()
	{
		$product = $this->productClass();
		$siteTranslations = App::getSiteTranslations();
		$labels = $this->productTranslations();
		$infos = [];

		// Description
		$descriptionLabel = !empty($labels['description']) ? $labels['description'] : 'Description';
		if ($product->product_meta['description']) {
			array_push( $infos, [ 
				'label' => $descriptionLabel, 
				'content' => $product->product_meta['description']
			]);
		}

		// Details
		$detailsLabel = !empty($labels['details']) ? $labels['details'] : 'Details';
		if ($product->product_meta['excerpt']) {
			array_push( $infos, [ 
				'label' => $detailsLabel, 
				'content' => $product->product_meta['excerpt']
			]);
		}
		
		// Shipping
		$shippingLabel = !empty($labels['shipping_delivery']) ? $labels['shipping_delivery'] : 'Shipping & Delivery';
		$shippingContent = Helper::localize( 'product_shipping_content' );

		if ($shippingContent) {
			array_push( $infos, [ 
				'label' => $shippingLabel, 
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
