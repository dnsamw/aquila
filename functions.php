<?php

/**
 * Theme functions
 * 
 * @package Auila
 */

use AQUILA_THEME\Inc\AQUILA_THEME;

if (!defined('AQUILA_DIR_PATH')) {
    define('AQUILA_DIR_PATH', untrailingslashit(get_template_directory()));
}


require_once AQUILA_DIR_PATH . '/inc/helpers/autoloader.php';

function aquila_get_theme_instance()
{
    AQUILA_THEME::get_instance();
}

aquila_get_theme_instance();

function aquila_enqueue_scripts()
{
    //register styles
    wp_register_style(
        'style-css', //handle
        get_stylesheet_uri(), //stylesheet path
        ['bootstrap-css'], //dependency array
        filemtime(get_template_directory() . '/style.css'), //dynamic version number based on modify time
        'all' // screen sizes
    );

    wp_register_style(
        'bootstrap-css', //handle
        get_template_directory_uri() . '/assets/src/library/css/bootstrap.min.css', //stylesheet path
        [], //dependency array
        '4.5.3', //dynamic version number based on modify time
        'all' // screen sizes
    );

    //register script
    wp_register_script(
        'main-js', //handle
        get_template_directory_uri() . '/assets/main.js', //path
        [],
        filemtime(get_template_directory() . '/assets/main.js'), //dynamic ver number
        true // include in footer
    );

    //Popper JS
    wp_register_script(
        'popper-js', //handle
        get_template_directory_uri() . '/assets/src/library/js/popper.min.js', //path
        [],
        '2.11.6 ', // ver number
        true // include in footer
    );

    //bootstrapJS
    wp_register_script(
        'bootstrap-js', //handle
        get_template_directory_uri() . '/assets/src/library/js/bootstrap.min.js', //path
        ['jquery', 'popper-js'],
        '4.5.3', //dynamic ver number
        true // include in footer
    );

    //enqueue script and css
    wp_enqueue_style('bootstrap-css');
    wp_enqueue_style('style-css');
    wp_enqueue_script('bootstrap-js');
    wp_enqueue_script('main-js');
}

add_action('wp_enqueue_scripts', 'aquila_enqueue_scripts');
