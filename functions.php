<?php
// Load the template functions.
// require get_template_directory() . '/classes/class-finna-nav-menu-walker.php';
// require get_template_directory() . '/inc/template-functions/header-functions.php';
// require get_template_directory() . '/inc/template-functions/nav-functions.php';
// require get_template_directory() . '/inc/template-functions/widget-functions.php';


/**
 *
 * This theme uses PSR-4 and OOP logic instead of procedural coding
 * Every function, hook and action is properly divided and organized inside related folders and files
 * Use the file `inc/Custom/Custom.php` to write your custom functions
 *
 * @package finna
 */

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) :
    require_once dirname(__FILE__) . '/vendor/autoload.php';
endif;

if (class_exists('Finna\\Init')) :
    Finna\Init::register_services();
endif;
