<?php

/**
 * Bootstrap (add all the basic functions not bootstrap css) the theme
 * 
 * @package Auila
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class AQUILA_THEME
{
    use Singleton;

    protected function __construct()
    {
        //load classes.
        Assets::get_instance();
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        //Actions
        add_action('wp_enqueue_scripts', [$this, 'register_styles']);
        add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
        add_action('after_setup_theme', [$this, 'setup_theme']);
    }

    public function setup_theme()
    {
        add_theme_support('title-tag');
        add_theme_support('custom-logo', [
            'header-text'          => ['site-title', 'site-description'],
            'height'               => 100,
            'width'                => 400,
            'flex-height'          => true,
            'flex-width'           => true,
            'unlink-homepage-logo' => true,
        ]);

        add_theme_support('custom-background', [
            'default-color' => '#f6f4ff',
            'default-image' => '',
        ]);
    }

    public function register_styles()
    {
        //register style css
        wp_register_style(
            'style-css', //handle
            get_stylesheet_uri(), //stylesheet path
            ['bootstrap-css'], //dependency array
            filemtime(AQUILA_DIR_PATH . '/style.css'), //dynamic version number based on modify time
            'all' // screen sizes
        );

        //register bootstrap css
        wp_register_style(
            'bootstrap-css', //handle
            AQUILA_DIR_URI . '/assets/src/library/css/bootstrap.min.css', //stylesheet path
            [], //dependency array
            '4.5.3', //dynamic version number based on modify time
            'all' // screen sizes
        );

        //enqueue css
        wp_enqueue_style('style-css');
        wp_enqueue_style('bootstrap-css');
    }

    public function register_scripts()
    {
        //register main script
        wp_register_script(
            'main-js', //handle
            AQUILA_DIR_URI . '/assets/main.js', //path
            [],
            filemtime(AQUILA_DIR_PATH . '/assets/main.js'), //dynamic ver number
            true // include in footer
        );

        //register popper JS
        wp_register_script(
            'popper-js', //handle
            AQUILA_DIR_URI . '/assets/src/library/js/popper.min.js', //path
            [],
            '2.11.6 ', // ver number
            true // include in footer
        );

        //register bootstrap JS
        wp_register_script(
            'bootstrap-js', //handle
            AQUILA_DIR_URI . '/assets/src/library/js/bootstrap.min.js', //path
            ['jquery', 'popper-js'],
            '4.5.3', //dynamic ver number
            true // include in footer
        );

        //enqueue scripts
        wp_enqueue_script('bootstrap-js');
        wp_enqueue_script('main-js');
        wp_enqueue_script('popper-js');
    }
}
