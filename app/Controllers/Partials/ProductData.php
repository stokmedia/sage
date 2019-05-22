<?php

namespace App\Controllers\Partials;

use App\Classes\Product;

trait ProductData
{
    public function get_product() {

    	$product = new Product( get_post()->ID );
    	
    	$data = (object) [];
    	$data->price = $product->getPrice();
    	$data->images = $product->getAllProductImages();

    	return $data;
	}
}