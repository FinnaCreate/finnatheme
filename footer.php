</main>

<?php do_action('finna_content_end'); ?>

</div>

<?php do_action('finna_content_after'); ?>

<footer id="colophon" class="py-12 bg-gray-50 site-footer" role="contentinfo">
    <?php do_action('finna_footer'); ?>

    <div class="mb-4"><?php dynamic_sidebar('mob-menu-socials'); ?></div>

    <div class="container mx-auto text-center text-gray-500">
        &copy; <?php echo date_i18n('Y'); ?> - <?php echo get_bloginfo('name'); ?>
    </div>
    <div class="container mx-auto text-center text-gray-500">
        <?php
        printf(
            '<a href="%s">%s</a>',
            esc_url(__('https://github.com/FinnaCreate/finnatheme', 'finna')),
            esc_html(Finna\Api\Customizer::text('finna_footer_copy_text'))
        );
        ?>
    </div>
</footer>

</div>

<?php wp_footer(); ?>

</body>

</html>
