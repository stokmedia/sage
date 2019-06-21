<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use App\Classes\Helper;
use App\Classes\Breadcrumbs;

class FourZeroFour extends Controller
{
    protected $template = '404';

    public function sometext() {

    	return "some text";	

    }

    public function breadcrumbs()
    {
        $page = $this->get404Page();

        $breadcrumbs = new Breadcrumbs($page->ID);

        return $breadcrumbs->render_breadcumbs( [
            'container_tag'     => 'div',
            'container_class'   => 'breadcrumb is-vertical d-inline-block',
            'template'          => '<a class="breadcrumb-item" href="{link}">{title}</a>',
            'template_active'   => '<span class="breadcrumb-item active">{title}</span>',
        ]);
    }
    
    public function get404Page()
    {
        return get_field( 'settings_404_page', Helper::current_lang() );
    }

    public function content()
    {
        // Get 404 page
        $postID = get_field( 'settings_404_page', Helper::current_lang() );

        return App::get_content($postID);
    }    
}