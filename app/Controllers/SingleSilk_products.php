<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class SingleSilk_products extends Controller
{

	use Partials\Product;

	public function productInformation()
	{
		return "This is a theme specific function";
	}
}