<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use App\Classes\Helper;

class FourZeroFour extends Controller
{
    use Partials\Content;
    use Partials\General;

    protected $template = '404';

    public function sometext() {

    	return "some text";	

    }

    public function content()
    {
        // Get 404 page
        $postID = get_field( 'settings_404_page', Helper::current_lang() );

        return self::get_content($postID);
    }    
}