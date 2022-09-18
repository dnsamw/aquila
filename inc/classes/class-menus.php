<?php

/**
 * Register Menus
 * 
 * @package Auila
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Menus
{
    use Singleton;

    protected function __construct()
    {
        //load classes.
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        //Actions
        add_action('init', [$this, 'register_menus']);
    }

    public function register_menus()
    {
        register_nav_menus(array(
            'aquila-header-menu' => esc_html__('Header Menu', 'aquila'),
            'aquila-footer-menu'  => esc_html__('Footer Menu', 'aquila'),
        ));
    }

    public function get_menu_id($location)
    {
        //Get all the locations
        $locations = get_nav_menu_locations();

        //Get menu id by location
        $menu_id = $locations[$location];

        return !empty($menu_id) ? $menu_id : '';
    }
}
