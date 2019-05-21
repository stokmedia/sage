<?php

namespace App\Controllers\Partials;

trait Product
{
    public function product_data()
    {
        return get_post_meta( get_the_ID(), 'product_data');
    }
}