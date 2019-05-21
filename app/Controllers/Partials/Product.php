<?php

namespace App\Controllers\Partials;

trait Product
{
    public function product_data()
    {
        return get_post_meta( get_the_ID(), 'product_data');
    }


    public function product_images( $size='thumb', $args = array() ) {

    	$product = get_post_meta( get_the_ID(), 'product_data')[0];

		$images 		= isset( $product['media'] ) ? $product['media'] : array();
		$attr 			= array();
		$replaces		= array();
		$productImages 	= array();
		$str 			= '';

		foreach ($images as $image_key => $image) {

			if ( $image['type'] != 'image' || !array_key_exists( $size,$image['sources'] ) )
				break;

			$str 			= '<img ';
			$attr['src'] 	= $image['sources'][ $size ]['url'];
			$attr['width'] 	= $image['sources'][ $size ]['width'];
			$attr['height'] = $image['sources'][ $size ]['height'];

			if( array_key_exists( 'big', $image['sources'] ) ) {
				$replaces['bigImageUrl'] = $image['sources'][ 'big' ]['url'];
			}

			foreach ($args as $key => $value) {
				$value = preg_replace_callback( '/\s?\{(.+?)\}\s?/', function ( $matches ) use ( $replaces ) {
					return $replaces[ $matches[1] ];
				}, $value );
				
				$attr[ $key ] = $value;
			}

			$str .= implode( ' ', array_map( function ( $v, $k ) {
				return sprintf( '%s="%s"', $k, $v);
			}, $attr, array_keys($attr) ) );

			$str .= '/>';
			$productImages[ $image_key ] = $str;

		}

		return $productImages;
	}
}