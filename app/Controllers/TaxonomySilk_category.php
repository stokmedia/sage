<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class TaxonomySilk_category extends Controller
{

	use Partials\Product;

    public static function title()
    {

    	$priceInfo = \EscGeneral::getPrice( get_the_ID() );
		$isAvailable = \EscGeneral::isAvailable( get_the_ID() );


        return get_post()->post_title;
    }

    public static function price()
    {
        return \EscGeneral::getPrice( get_the_ID() );
    }

    public static function image()
    {
        return get_post()->post_title;
    }

    public static function callback_method($arg = null)
    {

        return my_callback($arg);
    }
}