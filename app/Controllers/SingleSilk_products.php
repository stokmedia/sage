<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use App\Classes\Product;
use App\Classes\Helper;
use App\Classes\Breadcrumbs;

class SingleSilk_products extends Controller
{

	use Partials\ProductData;

    public function content()
    {
        // Get selected product page
        $postID = get_field( 'settings_selected_product', Helper::current_lang() );

        return App::get_content( $postID, 1 );
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
		$buttonAttr = [];
		
		// Soldout product
		if ($product->is_sold_out) {
			$buttonText = !empty($translations['product_states']['out_of_stock']) ? $translations['product_states']['out_of_stock'] : 'Out of stock';
			array_push( $buttonAttr, 'disabled' );
		
		// Add to cart
		} else {
			$buttonText = !empty($translations['buy_button']) ? $translations['buy_button'] : 'Add to cart';

		}

		// Add button text to button attr
		array_push( $buttonAttr, 'data-text="'. $buttonText .'"' );

		// Error message
		$errorMessage = !empty($translations['error_message']) ? $translations['error_message'] : 'Select size';
		array_push( $buttonAttr, 'data-error="'. $errorMessage .'"' );

		return (object) [
			'text' => $buttonText,
			'attr' => implode( ' ', $buttonAttr )
		];
	}

	public function productInformation()
	{
		$product = $this->productClass();
		$labels = $this->productTranslations();

		// Set default
		$defaultLabels = [
			'description' => 'Description',
			'care_instruction' => 'Care & washing instructions',
			'shipping_delivery' => 'Shipping & Delivery',
		];
		
		// Add description default label
		$descriptionLabel = !empty($labels['description']) ? $labels['description'] : $defaultLabels['description'];
		$infos = [ 'description_label' => $descriptionLabel ];		

		// Parse product content
		$parseDescription = Helper::sp_parse_product_details( $product->product_post->post_content );
		if (!empty($parseDescription)) {
			$infos = array_merge( $infos, $parseDescription );
		}

		// Care
		$careLabel = !empty($labels['care_instruction']) ? $labels['care_instruction'] : $defaultLabels['care_instruction'];
		if (!empty($product->product_meta['care'])) {
			array_push( $infos, [ 
				'label' => $careLabel, 
				'content' => $product->product_meta['care']['desc'] ?? '',
				'image' => $product->product_meta['care']['image'] ?? '',
			]);
		}		
		
		// Shipping
		$shippingLabel = !empty($labels['shipping_delivery']) ? $labels['shipping_delivery'] : $defaultLabels['shipping_delivery'];
		$shippingContent = Helper::localize( 'product_shipping_content' );

		if ($shippingContent) {
			array_push( $infos, [ 
				'label' => $shippingLabel, 
				'content' => $shippingContent
			]);
		}

		return array_map( function ( $info ) {
            return is_array($info) ? (object) $info : $info;
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
