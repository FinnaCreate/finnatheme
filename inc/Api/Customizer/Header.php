<?php

/**
 * Theme Customizer - Header
 *
 * @package finna
 */

namespace Finna\Api\Customizer;

use WP_Customize_Color_Control;
use Finna\Api\Customizer;

/**
 * Customizer class
 */
class Header
{
    /**
     * register default hooks and actions for WordPress
     * @return
     */
    public function register($wp_customize)
    {
        $wp_customize->add_section('finna_header_section', [
            'title' => __('Header', 'finna'),
            'description' => __('Customize the Header', 'finna'),
            'priority' => 35
        ]);

        $wp_customize->add_setting('finna_header_background_color', [
            'default' => '#ffffff',
            'transport' => 'postMessage', // or refresh if you want the entire page to reload
            'sanitize_callback'  => 'esc_attr',
        ]);

        $wp_customize->add_setting('finna_header_text_color', [
            'default' => '#333333',
            'transport' => 'postMessage', // or refresh if you want the entire page to reload
            'sanitize_callback'  => 'esc_attr',
        ]);

        $wp_customize->add_setting('finna_header_link_color', [
            'default' => '#004888',
            'transport' => 'postMessage', // or refresh if you want the entire page to reload
            'sanitize_callback'  => 'esc_attr',
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'finna_header_background_color', [
            'label' => __('Header Background Color', 'finna'),
            'section' => 'finna_header_section',
            'settings' => 'finna_header_background_color',
        ]));

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'finna_header_text_color', [
            'label' => __('Header Text Color', 'finna'),
            'section' => 'finna_header_section',
            'settings' => 'finna_header_text_color',
        ]));

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'finna_header_link_color', [
            'label' => __('Header Link Color', 'finna'),
            'section' => 'finna_header_section',
            'settings' => 'finna_header_link_color',
        ]));

        $wp_customize->get_setting('blogname')->transport = 'postMessage';
        $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

        if (isset($wp_customize->selective_refresh)) {
            $wp_customize->selective_refresh->add_partial('blogname', [
                'selector' => '.site-title a',
                'render_callback' => function () {
                    bloginfo('name');
                },
            ]);
            $wp_customize->selective_refresh->add_partial('blogdescription', [
                'selector' => '.site-description',
                'render_callback' => function () {
                    bloginfo('description');
                },
            ]);
            $wp_customize->selective_refresh->add_partial('finna_header_background_color', [
                'selector' => '#finna-header-control',
                'render_callback' => [$this, 'outputCss'],
                'fallback_refresh' => true
            ]);
            $wp_customize->selective_refresh->add_partial('finna_header_text_color', [
                'selector' => '#finna-header-control',
                'render_callback' => [$this, 'outputCss'],
                'fallback_refresh' => true
            ]);
            $wp_customize->selective_refresh->add_partial('finna_header_link_color', [
                'selector' => '#finna-header-control',
                'render_callback' => [$this, 'outputCss'],
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
        echo Customizer::css('.site-header', 'background-color', 'finna_header_background_color');
        echo Customizer::css('.site-header', 'color', 'finna_header_text_color');
        echo Customizer::css('.site-header a', 'color', 'finna_header_link_color');
        echo '</style>';
    }
}
