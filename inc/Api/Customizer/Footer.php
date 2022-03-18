<?php

/**
 * Theme Customizer - Footer
 *
 * @package finna
 */

namespace Finna\Api\Customizer;

use WP_Customize_Control;
use WP_Customize_Color_Control;

use Finna\Api\Customizer;

/**
 * Customizer class
 */
class Footer
{
    /**
     * register default hooks and actions for WordPress
     * @return
     */
    public function register($wp_customize)
    {
        $wp_customize->add_section('finna_footer_section', [
            'title' => __('Footer', 'finna'),
            'description' => __('Customize the Footer', 'finna'),
            'priority' => 162
        ]);

        $wp_customize->add_setting('finna_footer_background_color', [
            'default' => '#ffffff',
            'transport' => 'postMessage', // or refresh if you want the entire page to reload
            'sanitize_callback'  => 'esc_attr',
        ]);

        $wp_customize->add_setting('finna_footer_copy_text', [
            'default' => 'Proudly powered by Finna',
            'transport' => 'postMessage', // or refresh if you want the entire page to reload
            'sanitize_callback'  => 'esc_attr',
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'finna_footer_background_color', [
            'label' => __('Background Color', 'finna'),
            'section' => 'finna_footer_section',
            'settings' => 'finna_footer_background_color',
        ]));

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'finna_footer_copy_text', [
            'label' => __('Copyright Text', 'finna'),
            'section' => 'finna_footer_section',
            'settings' => 'finna_footer_copy_text',
        ]));

        if (isset($wp_customize->selective_refresh)) {
            $wp_customize->selective_refresh->add_partial('finna_footer_background_color', [
                'selector' => '#finna-footer-control',
                'render_callback' => [$this, 'outputCss'],
                'fallback_refresh' => true
            ]);

            $wp_customize->selective_refresh->add_partial('finna_footer_copy_text', [
                'selector' => '#finna-footer-copy-control',
                'render_callback' => [$this, 'outputText'],
                'fallback_refresh' => true
            ]);
        }
    }

    /**
     * Generate inline CSS for customizer async reload
     */
    public function outputCss()
    {
        echo '<style type="text/css">';
        echo Customizer::css('.site-footer', 'background-color', 'finna_footer_background_color');
        echo '</style>';
    }

    /**
     * Generate inline text for customizer async reload
     */
    public function outputText()
    {
        echo Customizer::text('finna_footer_copy_text');
    }
}
