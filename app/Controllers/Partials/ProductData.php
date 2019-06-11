<?php

namespace App\Controllers\Partials;

use App\Classes\Product;

trait ProductData
{
    public function get_product( $postID=null ) {

		if (empty($postID)) {
			$postID = get_post()->ID;
		}

    	$product = new Product( $postID );
    	
    	$data = (object) [];
    	$data->price = $product->getPrice();
    	$data->images = $product->getAllProductImages();

    	return $data;
	}
}