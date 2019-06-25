<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class TemplateThankyou extends Controller
{

    public function content()
    {
        return App::get_content( get_post()->ID, 1 );
	} 
}