<?php

/**
 * Theme functions
 * 
 * @package Auila
 */

function aquila_enqueue_scripts()
{
    wp_enqueue_style(
        'stylesheet', //handle
        get_stylesheet_uri(), //stylesheet path
        [], //dependency array
        filemtime(get_template_directory() . '/style.css'), //dynamic version number based on modify time
        'all' // screen sizes
    );
}
add_action('wp_enqueue_scripts', 'aquila_enqueue_scripts');
