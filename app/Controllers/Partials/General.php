<?php

namespace App\Controllers\Partials;

trait General
{
    public static function currentLang( $value='slug' )
    {
        $defaultValue = $value == 'locale' ? 'en_GB' : 'en';

		return function_exists('pll_current_language') ? pll_current_language( $value ) : $defaultValue;
    }

    public function defaultUsp()
    {
        $defaultUsp = get_field( 'default_usp',self::currentLang() );
        $list = $defaultUsp['usp'] ?? []; 

        return $list;
    }  
}