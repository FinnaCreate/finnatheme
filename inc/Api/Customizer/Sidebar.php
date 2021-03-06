<?php

/**
 * Theme Customizer - Sidebar
 *
 * @package finna
 */

namespace Finna\Api\Customizer;

use WP_Customize_Color_Control;
use Finna\Api\Customizer;

/**
 * Customizer class
 */
class Sidebar
{
    /**
     * register default hooks and actions for WordPress
     * @return
     */
    public function register($wp_customize)
    {
        $wp_customize->add_section('finna_sidebar_section', [
            'title' => __('Sidebar', 'finna'),
            'description' => __('Customize the Sidebar', 'finna'),
            'priority' => 161
        ]);

        $wp_customize->add_setting('finna_sidebar_background_color', [
            'default' => '#ffffff',
            'transport' => 'postMessage', // or refresh if you want the entire page to reload
            'sanitize_callback'  => 'esc_attr',
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'finna_sidebar_background_color', array(
            'label' => __('Background Color', 'finna'),
            'section' => 'finna_sidebar_section',
            'settings' => 'finna_sidebar_background_color',
        )));

        if (isset($wp_customize->selective_refresh)) {
            $wp_customize->selective_refresh->add_partial('finna_sidebar_background_color', [
                'selector' => '#finna-sidebar-control',
                'render_callback' => [$this, 'output'],
                'fallback_refresh' => true
            ]);
        }
    }

    /**
     * Generate inline CSS for customizer async reload
     */
    public function output()
    {
        echo '<style type="text/css">';
        echo Customizer::css('#sidebar', 'background-color', 'finna_sidebar_background_color');
        echo '</style>';
    }
}
