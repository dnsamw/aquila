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
        [], //dependency array
        filemtime(get_template_directory() . '/style.css'), //dynamic version number based on modify time
        'all' // screen sizes
    );

    //register script
    wp_register_script(
        'main-js', //handle
        get_template_directory_uri() . '/assets/js/main.js', //path
        filemtime(get_template_directory() . '/assets/js/main.js'), //dynamic ver number
        true // include in footer
    );

    //enqueue script and css
    wp_enqueue_style('style-css');
    wp_enqueue_script('main-js');
}
add_action('wp_enqueue_scripts', 'aquila_enqueue_scripts');
