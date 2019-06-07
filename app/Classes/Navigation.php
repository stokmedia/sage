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
class Navigation
{
    public static function getMenu( $menuName )
    {
        if ( !has_nav_menu( $menuName ) ) {
            return null;
        }

        return wp_get_nav_menu_items( get_nav_menu_locations()[ $menuName ] );
    }

    public static function desktopMenu()
    {
        return self::getMenu( 'header_navigation' );
    }

    public static function mobileMenu()
    {
        return self::getMenu( 'header_navigation_mobile' );
    }
}