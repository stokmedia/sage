<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Single extends Controller
{
	protected $acf = true;

	public function sometext() {
		return "SOME TEXT";
	}
}