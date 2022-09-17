<?php

/**
 * Theme functions
 * 
 * @package Auila
 */

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
        ['jquery'], //dependency array
        '4.5.3', //dynamic version number based on modify time
        'all' // screen sizes
    );

    //register script
    wp_register_script(
        'main-js', //handle
        get_template_directory_uri() . '/assets/main.js', //path
        filemtime(get_template_directory() . '/assets/main.js'), //dynamic ver number
        true // include in footer
    );

    wp_register_script(
        'bootstrap-js', //handle
        get_template_directory_uri() . '/assets/src/library/bootstrap.min.js', //path
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
