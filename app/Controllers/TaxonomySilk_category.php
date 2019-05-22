<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use App\Classes\Product;

class TaxonomySilk_category extends Controller
{

	use Partials\ProductData;

    public static function title()
    {
        return get_post()->post_title;
    }

}