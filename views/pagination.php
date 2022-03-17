<?php

/**
 * A template partial to output pagination for the Finna default theme.
 *
 * @package WordPress
 * @subpackage Finna
 * @since Finna 1.0
 */

$prev_text = sprintf(
    '%s <span class="nav-prev-text">%s</span>',
    '<span aria-hidden="true">&larr;</span>',
    /*
	 * Translators: This text contains HTML to allow the text to be shorter on small screens.
	 * The text inside the span with the class nav-short will be hidden on small screens.
	 */
    __('Newer <span class="hidden lg:inline-block">Posts</span>', 'finna')
);
$next_text = sprintf(
    '<span class="nav-next-text">%s</span> %s',
    /*
	 * Translators: This text contains HTML to allow the text to be shorter on small screens.
	 * The text inside the span with the class nav-short will be hidden on small screens.
	 */
    __('Older <span class="hidden lg:inline-block">Posts</span>', 'finna'),
    '<span aria-hidden="true">&rarr;</span>'
);

$posts_pagination = get_the_posts_pagination(
    array(
        'mid_size'  => 1,
        'prev_text' => $prev_text,
        'next_text' => $next_text,
    )
);

// If we're not outputting the previous page link, prepend a placeholder with `visibility: hidden` to take its place.
if (strpos($posts_pagination, 'prev page-numbers') === false) {
    $posts_pagination = str_replace('<div class="nav-links">', '<div class="nav-links text-2xl font-semibold flex justify-center lg:justify-between lg:m-0 lg:w-full"><span class="" aria-hidden="true">' . $prev_text . '</span>', $posts_pagination);
}

// If we're not outputting the next page link, append a placeholder with `visibility: hidden` to take its place.
if (strpos($posts_pagination, 'next page-numbers') === false) {
    $posts_pagination = str_replace('</div>', '<span class="" aria-hidden="true">' . $next_text . '</span></div>', $posts_pagination);
}

if ($posts_pagination) { ?>

<div class="">

    <hr class="border-none" aria-hidden="true" />

    <?php echo $posts_pagination; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- already escaped during generation.
        ?>

</div><!-- .pagination-wrapper -->

<?php
}
