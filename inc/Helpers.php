<?php

/**
 * Helpers methods
 * List all your static functions you wish to use globally on your theme
 *
 * @package finna
 */

if (!function_exists('dd')) {
    /**
     * Var_dump and die method
     *
     * @return void
     */
    function dd()
    {
        echo '<pre>';
        array_map(function ($x) {
            var_dump($x);
        }, func_get_args());
        echo '</pre>';
        die;
    }
}

if (!function_exists('starts_with')) {
    /**
     * Determine if a given string starts with a given substring.
     *
     * @param  string  $haystack
     * @param  string|array  $needles
     * @return bool
     */
    function starts_with($haystack, $needles)
    {
        foreach ((array) $needles as $needle) {
            if ($needle != '' && substr($haystack, 0, strlen($needle)) === (string) $needle) {
                return true;
            }
        }
        return false;
    }
}

if (!function_exists('cache_bust')) {
    /**
     * Get the path to a versioned Mix file.
     *
     * @param  string  $path
     * @param  string  $manifestDirectory
     * @return \Illuminate\Support\HtmlString
     *
     * @throws \Exception
     */
    /**
     * Get asset path.
     *
     * @param string $path Path to asset.
     *
     * @return string
     */
    function cache_bust($path)
    {
        if (wp_get_environment_type() === 'production') {
            return get_stylesheet_directory_uri() . '/' . $path;
        }

        return add_query_arg('time', time(), get_stylesheet_directory_uri() . '/' . $path);
    }
}

if (!function_exists('assets')) {
    /**
     * Easily point to the assets dist folder.
     *
     * @param  string  $path
     */
    function assets($path)
    {
        if (!$path) {
            return;
        }

        echo get_template_directory_uri() . '/assets/' . $path;
    }
}

if (!function_exists('svg')) {
    /**
     * Easily point to the assets dist folder.
     *
     * @param  string  $path
     */
    function svg($path)
    {
        if (!$path) {
            return;
        }

        echo get_template_part('assets/svg/inline', $path . '.svg');
    }
}
