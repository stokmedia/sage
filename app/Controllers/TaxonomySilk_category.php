<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class TaxonomySilk_category extends Controller
{

	use Partials\Product;

    public static function title()
    {
        return get_post()->post_title;
    }
}