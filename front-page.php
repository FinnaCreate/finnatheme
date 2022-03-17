<?php

/**
 * The template for displaying the front page
 *
 * @package WordPress
 * @subpackage Finna
 * @since Finna 1.0
 */

get_header();

?>
<!-- Start content -->
<div class="container pb-12 mx-auto my-12 border-b">

    <!-- Start introduction -->
    <?php if (is_front_page()) : ?>
    <div class="container pb-12 mx-auto my-12 border-b">
        <h1 class="text-lg font-bold uppercase text-secondary">TailPress</h1>
        <h2 class="my-4 text-3xl font-extrabold tracking-tight lg:text-7xl">Rapidly build your WordPress theme
            with <a href="https://tailwindcss.com" class="text-primary">Tailwind CSS</a>.</h2>
        <p class="mb-10 max-w-screen-lg text-lg font-medium text-gray-700">TailPress is your go-to starting
            point for developing WordPress themes with TailwindCSS and comes with basic block-editor support out
            of the box.</p>
        <a href="https://github.com/jeffreyvr/tailpress" class="flex-none px-6 py-3 w-full text-lg font-semibold leading-6 text-white bg-gray-900 rounded-xl border border-transparent transition-colors duration-200 sm:w-auto focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-gray-900 focus:outline-none">View
            on Github</a>
    </div>

    <div class="container mx-auto my-8">

        <?php get_template_part('views/content/content', 'page'); ?>

    </div>
    <?php endif; ?>
    <!-- End introduction -->

</div>
<!-- End content -->
<?php get_footer(); ?>
