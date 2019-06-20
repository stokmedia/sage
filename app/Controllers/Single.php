<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use App\Classes\Helper;

class Single extends Controller
{
	protected $acf = true;

	public function sometext() {
		return "SOME TEXT";
	}

	// public function postContent()
	// {
	// 	$data = (object) [];

	// 	$post = get_post();
	// 	$data->id = 0;
	// 	$data->title = $post->post_title;
	// 	$data->preamble = null;
    //     $data->link = false;
	// 	$data->has_content = true;
	// 	$data->classes = 'has-pt';		
    //     $data->content = Helper::sp_render_text( [
    //         'size_guide' => \App\template( 'partials.size-guide', [ 'size_guide' => App::getSizeGuideData() ] )
	// 	], $post->post_content );

    //     return $data;		
	// }
}