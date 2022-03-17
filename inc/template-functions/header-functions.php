<?php

if (!function_exists('finna_setup')) {
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     *
     * @since Finna Theme 1.0
     *
     * @return void
     */
    function finna_setup()
    {
        /*
        * Let WordPress manage the document title.
        * This theme does not use a hard-coded <title> tag in the document head,
        * WordPress will provide it for us.
        */
        add_theme_support('title-tag');

        register_nav_menus(
            [
                'primary' => __('Primary Menu', 'finna'),
                'footer' => __('Footer Menu', 'finna'),
            ]
        );

        /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
        add_theme_support(
            'html5',
            [
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            ]
        );

        /*
        * Add support for core custom logo.
        *
        * @link https://codex.wordpress.org/Theme_Logo
        */
        add_theme_support(
            'custom-logo',
            [
                'height' => 100,
                'width' => 300,
                'flex-width' => true,
                'flex-height' => true,
                'unlink-homepage-logo' => true,
            ]
        );

        add_theme_support('automatic-feed-links');

        /*
        * Enable support for Post Thumbnails on posts and pages.
        *
        * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        */
        add_theme_support('post-thumbnails');

        // Add support for full and wide align images.
        add_theme_support('align-wide');

        // Add support for Block Styles.
        add_theme_support('wp-block-styles');

        // Add support for editor styles.
        add_theme_support('editor-styles');

        // Enqueue editor styles.
        add_editor_style('css/editor-style.css');
    }
}
add_action('after_setup_theme', 'finna_setup');

/**
 * Enqueue theme assets.
 */
function finna_enqueue_scripts()
{
    $theme = wp_get_theme();

    wp_enqueue_style('finna', finna_asset('assets/build/css/app.css'), [], $theme->get('Version'));
    wp_enqueue_script('finna', finna_asset('assets/build/js/app.js'), [], $theme->get('Version'));

    // Add Alpine.js cdn
    if (defined('ALPINEJS')) {
        wp_enqueue_script('alpinejs', '//unpkg.com/alpinejs@3.x.x/dist/cdn.min.js', [], null);
    }

    if (wp_get_environment_type() === 'local') {
        wp_enqueue_script('browser-sync', '//wordpress.test:3000/browser-sync/browser-sync-client.js?v=2.27.7', [], null, true);
    }
}
add_action('wp_enqueue_scripts', 'finna_enqueue_scripts');

/**
 * Defer scripts.
 */
function finna_defer_scripts($tag, $handle, $src)
{
    $defer = [
        'alpinejs'
    ];
    if (in_array($handle, $defer)) {
        return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
    }

    return $tag;
}
add_filter('script_loader_tag', 'finna_defer_scripts', 10, 3);

/**
 * Async scripts.
 */
function finna_async_scripts($tag, $handle, $src)
{
    $async = [
        'browser-sync'
    ];
    if (in_array($handle, $async)) {
        return '<script async src="' . $src . '" type="text/javascript"></script>' . "\n";
    }

    return $tag;
}
add_filter('script_loader_tag', 'finna_async_scripts', 10, 3);

/**
 * Get asset path.
 *
 * @param string $path Path to asset.
 *
 * @return string
 */
function finna_asset($path)
{
    if (wp_get_environment_type() === 'production') {
        return get_stylesheet_directory_uri() . '/' . $path;
    }

    return add_query_arg('time', time(), get_stylesheet_directory_uri() . '/' . $path);
}
