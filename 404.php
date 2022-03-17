<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body class="antialiased">
    <div class="min-h-screen md:flex">
        <div class="flex justify-center items-center w-full md:w-1/2">
            <div class="m-8 max-w-sm">
                <div class="text-5xl text-gray-800 border-b md:text-15xl border-primary">404</div>
                <div class="my-3 w-16 h-1 bg-purple-light md:my-6"></div>
                <p class="mb-8 text-2xl font-light text-gray-800 md:text-3xl"><?php _e('Sorry, the page you are looking for could not be found.', 'finna'); ?></p>
                <a href="<?php echo esc_url(home_url()); ?>" class="px-4 py-2 text-white rounded bg-primary">
                    <?php _e('Go Home', 'finna'); ?>
                </a>
            </div>
        </div>
    </div>
</body>

</html>
