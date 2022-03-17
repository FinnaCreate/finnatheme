<?php

/**
 * Template part for displaying content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package finna
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('mb-12 col-span-2'); ?> class="col-span-2">

    <header class="entry-header mb-4">
        <?php if (has_post_thumbnail()) : ?>
        <img class="rounded-md" src="<?php esc_url(the_post_thumbnail_url('medium')) ?>" alt="image">
        <?php endif ?>

        <?php the_title(sprintf('<h2 class="entry-title text-2xl md:text-3xl font-extrabold leading-tight mb-1"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>

        <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished" class="text-sm text-gray-700"><?php echo get_the_date(); ?></time>

        <div class="text-sm"><?php comments_number(); ?></div>
    </header>

    <div class="entry-content">
        <?php
        /* translators: %s: Name of current post */
        // the_content(
        //     sprintf(
        //         __('Continue reading %s', 'finna'),
        //         the_title('<span class="screen-reader-text">"', '"</span>', false)
        //     )
        // );
        the_excerpt();
        ?>
        <a class="text-pink-700 font-bold" href="<?php esc_url(the_permalink()) ?>">Read more &rarr;</a>

        <?php
        wp_link_pages(
            [
                'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'finna') . '</span>',
                'after' => '</div>',
                'link_before' => '<span>',
                'link_after' => '</span>',
                'pagelink' => '<span class="screen-reader-text">' . __('Page', 'finna') . ' </span>%',
                'separator' => '<span class="screen-reader-text">, </span>',
            ]
        );
        ?>
    </div>

</article>
