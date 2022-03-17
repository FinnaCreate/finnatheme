<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="mb-4 entry-header">
        <?php if (has_post_thumbnail()) : ?>
        <img class="rounded-md" src="<?php esc_url(the_post_thumbnail_url()) ?>" alt="image">
        <?php endif ?>
        <?php the_title(sprintf('<h1 class="mb-1 text-2xl font-extrabold leading-tight entry-title lg:text-5xl"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h1>'); ?>
        <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished" class="text-sm text-gray-700"><?php echo get_the_date(); ?></time>
        <div>
            <?php
            $posttags = get_the_tags();
            if ($posttags) {
                foreach ($posttags as $tag) {
                    echo '<span class="px-2 py-1 mr-2 bg-gray-300 rounded-md">' . $tag->name . '</span>';
                }
            }
            ?>
        </div>
    </header>

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
