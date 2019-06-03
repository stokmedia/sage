<?php

namespace App\PostTypes;

use App\Classes\CPT;

class Reseller 
{
    function __construct() 
    {
		$instance = new CPT( array(

			'post_type_name' => 'reseller',
			'singular' => 'Reseller',
			'plural' => 'Resellers',
            'slug' => 'reseller'
            
		), array(

			'supports' => array( 'title' ),
            'menu_icon' => 'dashicons-store'
            
        ) );
        		
	}
}

new Reseller();