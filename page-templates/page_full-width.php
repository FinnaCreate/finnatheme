<?php

/**
 * Template Name: Full Width Page
 *
 * @package WordPress
 * @subpackage Finna
 * @since Finna 1.0
 */
?>

<?php get_header(); ?>

<div class="container mx-auto my-8">

    <?php get_template_part('template-parts/content/content', 'page'); ?>

</div>

<?php
get_footer();
