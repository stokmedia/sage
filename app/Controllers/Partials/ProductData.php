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
        
        $data->product_meta = $product->product_meta;

        var_dump($data->product_meta);

        if( $product->isBundle() && is_single() ) {

            // TODO: Maybe needed?
            //var_dump(General::currentLang());

            $data->bundle = $product->getBundle();
        }

    	return $data;
	}
}