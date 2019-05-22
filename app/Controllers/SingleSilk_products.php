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

}
