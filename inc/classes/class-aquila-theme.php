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
        $this->set_hooks();
    }

    protected function set_hooks()
    {
        //actions and filters. 
    }
}
