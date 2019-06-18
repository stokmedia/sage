<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use App\Classes\Product;

class SingleSilk_products extends Controller
{

	use Partials\ProductData;

	public function productInformation()
	{
		return "This is a theme specific function";
	}

	public function variant_media() {
		$variant_sku = wp_get_post_terms( get_the_ID(),  array('fields' => 'silk_product_variant_sku' ))[0];
		$variant_media = get_field( 'inspiration_media', 'term_' . $variant_sku->term_id );
		return $variant_media;
	}
	public function product_media() {
		$product_sku = wp_get_post_terms( get_the_ID(),  array('fields' => 'silk_product_sku' ))[0];
		$variant_media = get_field( 'inspiration_media', 'term_' . $product_sku->term_id );
		return $variant_media;
	}
}
