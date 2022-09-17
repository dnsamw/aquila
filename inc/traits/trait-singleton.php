<?php

/**
 * If you specifically need multiple objects, then use a normal class.
 *
 * @package Aquila
 */

namespace AQUILA_THEME\Inc\Traits;

/**
 * 
 */
trait Singleton
{
    public function __construct()
    {
    }

    //to prevent object cloning
    public function __clone()
    {
    }

    final public static function get_instance()
    {
        static $instance = [];

        $called_class = get_called_class();
        if (!isset($instance[$called_class])) {
            $instance[$called_class] = new $called_class();

            //in case if any plugin want to hook in to this
            do_action('aquila_theme_singleton_init%s', $called_class);
        }
        return $instance[$called_class];
    }
}
