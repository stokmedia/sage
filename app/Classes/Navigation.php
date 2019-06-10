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
    private static function getMenu( $menuName )
    {
        if ( !has_nav_menu( $menuName ) ) {
            return null;
        }

        $menu = wp_get_nav_menu_items( get_nav_menu_locations()[ $menuName ] );
        $newMenu = array();

        // Group by menu parent
        foreach ( $menu as $menuItem ) {
            if ( $menuItem->menu_item_parent === '0' ) {
                $newMenu[ $menuItem->ID ] = $menuItem;
                $newMenu[ $menuItem->ID ]->children = array();
            } else {
                if ( !isset( $newMenu[ $menuItem->menu_item_parent ] ) ) {
                    continue;
                }

                $newMenu[ $menuItem->menu_item_parent ]->children[ ] = $menuItem;
            }
        }

        return $newMenu;
    }

    public static function desktopMenu()
    {
        return self::getMenu( 'header_navigation' );
    }

    public static function mobileMenu()
    {
        return self::getMenu( 'header_navigation_mobile' );
    }

    public static function desktopFooterMenu()
    {
        // Return only 3 parent menu items
        $menu = self::getMenu( 'footer_navigation' );

        return array_splice( $menu, 0, 3 );
    }

    public static function mobileFooterMenu()
    {
        // Return only 1 parent menu item
        $menu = self::getMenu( 'footer_navigation_mobile' );

        return array_splice( $menu, 0, 1 );
    }
}