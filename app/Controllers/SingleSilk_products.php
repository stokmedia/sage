<?php

namespace App\Controllers;

use Sober\Controller\Controller;

include_once( \Esc::directory() . '/modules/general.php' );

class SingleSilk_products extends Controller
{

	use Partials\Product;

	public function productInformation()
	{

		$priceInfo = \EscGeneral::getPrice( get_the_ID() );
		$isAvailable = \EscGeneral::isAvailable( get_the_ID() );

		//var_dump($priceInfo);

		return "This is a theme specific function";
	}
}
