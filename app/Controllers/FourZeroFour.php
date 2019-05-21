<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class FourZeroFour extends Controller
{
    protected $template = '404';

    public function sometext() {

    	return "some text";	

    }
}