<?php

namespace Finna\Base;

class Setup
{
    /**
     * register default hooks and actions for WordPress
     * @return
     */
    public function register()
    {
        add_action('after_setup_theme', array($this, 'setup'));
        add_action('after_setup_theme', array($this, 'content_width'), 0);
    }

    public function setup()
    {
        /*
         * You can activate this if you're planning to build a multilingual theme
         */
        // load_theme_textdomain( 'finna', get_template_directory() . '/languages' );

        /*
         * Default Theme Support options better have
         */
        add_theme_support('automatic-feed-links');

        /*
        * Let WordPress manage the document title.
        * This theme does not use a hard-coded <title> tag in the document head,
        * WordPress will provide it for us.
        */
        add_theme_support('title-tag');

        /*
        * Enable support for Post Thumbnails on posts and pages.
        *
        * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        */
        add_theme_support('post-thumbnails');

        add_theme_support('customize-selective-refresh-widgets');

        // Add support for full and wide align images.
        add_theme_support('align-wide');

        // Add support for Block Styles.
        add_theme_support('wp-block-styles');

        // Add support for editor styles.
        add_theme_support('editor-styles');

        // Enqueue editor styles.
        add_editor_style('css/editor-style.css');

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

        add_theme_support('custom-background', apply_filters('finna_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

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

        // add_theme_support('custom-background', apply_filters('awps_custom_background_args', [
        //     'default-color' => 'ffffff',
        //     'default-image' => '',
        // ]));

        /*
         * Activate Post formats if you need
         */
        add_theme_support('post-formats', [
            'aside',
            'gallery',
            'link',
            'image',
            'quote',
            'status',
            'video',
            'audio',
            'chat',
        ]);

        /**
         * Add woocommerce support and woocommerce override
         */
        // add_theme_support( 'woocommerce' );

        /**
         * Add starter content support - setup theme demo content
         *
         * @return void
         */
        // add_theme_support('starter-content');
    }

    /*
        Define a max content width to allow WordPress to properly resize your images
    */
    public function content_width()
    {
        $GLOBALS['content_width'] = apply_filters('content_width', 1440);
    }
}
