<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package finna
 */

?>

<article>
    <div class="entry-content">
        <?php the_content(); ?>

        <?php
        wp_link_pages(
            [
                'before'      => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'finna') . '</span>',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
                'pagelink'    => '<span class="screen-reader-text">' . __('Page', 'finna') . ' </span>%',
                'separator'   => '<span class="screen-reader-text">, </span>',
            ]
        );
        ?>
    </div>
</article>
