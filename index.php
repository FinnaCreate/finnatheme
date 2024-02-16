<?php get_header(); ?>

<div class="container mx-auto my-8">

    <?php if (have_posts()) : ?>
        <div class="grid grid-cols-6 gap-6">
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('views/content/content', get_post_format()); ?>
            <?php endwhile; ?>
        </div>

    <?php endif; ?>

    <?php get_template_part('views/pagination'); ?>

</div>

<?php
get_footer();
