<?php

namespace Finna\Setup;

/**
 * Enqueue.
 */
class Enqueue
{
    /**
     * register default hooks and actions for WordPress
     * @return
     */
    public function register()
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);

        add_filter('script_loader_tag', [$this, 'defer_scripts'], 10, 3);

        add_filter('script_loader_tag', [$this, 'async_scripts'], 10, 3);
    }

    /**
     * Notice the cache_bust() function in wp_enqueue_...
     * It provides the path to a versioned asset using querystring-based
     * cache-busting (This means, the file name won't change, but the time string will.)
     */
    public function enqueue_scripts()
    {
        // Deregister the built-in version of jQuery from WordPress
        if (!is_customize_preview()) {
            wp_deregister_script('jquery');
        }

        $theme = wp_get_theme();

        wp_enqueue_style('finna', cache_bust('assets/build/css/app.css'), [], $theme->get('Version'));
        wp_enqueue_script('finna', cache_bust('assets/build/js/app.js'), [], $theme->get('Version'));

        // Add Alpine.js cdn
        if (ALPINEJS) {
            wp_enqueue_script('alpinejs', '//unpkg.com/alpinejs@3.x.x/dist/cdn.min.js', [], null);
        }

        if (wp_get_environment_type() === 'local') {
            wp_enqueue_script('browser-sync', WP_SITEURL . ':3000/browser-sync/browser-sync-client.js?v=2.27.7', [], null, true);
        }

        // Extra
        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }

    /**
     * Defer scripts.
     */
    public function defer_scripts($tag, $handle, $src)
    {
        $defer = [
            'alpinejs'
        ];
        if (in_array($handle, $defer)) {
            return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
        }

        return $tag;
    }

    /**
     * Async scripts.
     */
    public function async_scripts($tag, $handle, $src)
    {
        $async = [
            'browser-sync'
        ];
        if (in_array($handle, $async)) {
            return '<script async src="' . $src . '" type="text/javascript"></script>' . "\n";
        }

        return $tag;
    }

    /**
     * Get asset path.
     *
     * @param string $path Path to asset.
     *
     * @return string
     */
    public function finna_asset($path)
    {
        if (wp_get_environment_type() === 'production') {
            return get_stylesheet_directory_uri() . '/' . $path;
        }

        return add_query_arg('time', time(), get_stylesheet_directory_uri() . '/' . $path);
    }
}
