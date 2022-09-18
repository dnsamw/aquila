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
}
