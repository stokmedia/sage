<?php
/**
 * Created by PhpStorm.
 * User: STOK
 * Date: 07/06/2019
 * Time: 6:09 PM
 */

namespace App\Classes;

/**
 * All navigation related code goes here
 * @package App\Classes
 */
class Navigation {
    public static function desktopMenu()
    {
        if ( !has_nav_menu( 'header_navigation' ) ) {
            return null;
        }

        return wp_get_nav_menu_items(get_nav_menu_locations()['header_navigation']);
    }

    public static function mobileMenu()
    {
        if ( !has_nav_menu( 'header_navigation_mobile' ) ) {
            return null;
        }

        return wp_get_nav_menu_items(get_nav_menu_locations()['header_navigation_mobile']);
    }
}