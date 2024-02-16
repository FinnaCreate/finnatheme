<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-white text-gray-900 antialiased'); ?>>

    <?php wp_body_open(); ?>

    <?php do_action('finna_site_before'); ?>

    <div id="page" class="flex flex-col min-h-screen">

        <?php do_action('finna_header'); ?>

        <?php get_template_part('views/header/site-header'); ?>

        <div id="content" class="flex-grow site-content">

            <?php do_action('finna_content_start'); ?>

            <main>
