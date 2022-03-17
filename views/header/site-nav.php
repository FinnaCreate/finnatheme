<?php

/**
 * Displays the site nav.
 *
 * @package finna
 * @subpackage Finna
 * @since Finna 1.0
 */

$menuSocialIcons = '<svg class="w-16 h-16 text-blue-600 fill-current"
                viewBox="0 0 24 24">
                <path
                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"
                />
                </svg>
                <svg class="w-16 h-16 text-blue-300 fill-current"
                    viewBox="0 0 24 24">
                    <path
                        d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"
                    />
                </svg>
                <svg class="w-16 h-16 text-green-400 fill-current"
                    viewBox="0 0 448 512">
                    <path
                        d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"
                    ></path>
                </svg>';
?>

<nav class="flex justify-between items-center p-6 lg:p-12">
    <div class="z-50 lg:flex-shrink-0">
        <?php if (has_custom_logo()) { ?>
        <?php the_custom_logo(); ?>
        <?php } else { ?>
        <div class="text-lg uppercase">
            <a href="<?php echo esc_url(home_url()); ?>" class="text-lg font-extrabold uppercase" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
                <?php bloginfo('name'); ?>
            </a>
        </div>

        <p class="text-sm font-light text-gray-600">
            <?php bloginfo('description'); ?>
        </p>
        <?php } ?>
    </div>

    <div class="flex justify-between items-center space-x-4">
        <?php wp_nav_menu([
            'menu'            => 'primary',
            'theme_location'  => 'primary',
            // 'container'       => '',
            'container_id'    => 'primary-menu',

            // Main div classes
            'container_class' => 'flex-1 hidden flex flex-col justify-between w-full h-full lg:h-auto lg:w-auto fixed top-0 left-0 py-4 bg-white lg:mt-0 lg:p-0 lg:bg-transparent lg:relative',

            // Main ul wrapper override
            'items_wrap' => '<div class="flex overflow-y-auto flex-col flex-1 mt-24 items-justified-center lg:mt-0 lg:overflow-visible"><ul id="%1$s" class="%2$s">%3$s</ul></div><div class="flex justify-center my-4 space-x-6 lg:hidden">' . $menuSocialIcons . '</div>',

            // Main ul classes
            'menu_class'      => ' text-center flex flex-col overflow-y-auto lg:overflow-visible lg:my-0 lg:h-auto text-2xl lg:text-base lg:h-auto lg:py-0 lg:flex-row lg:-mx-4 lg:flex-wrap lg:pl-4',

            // Main li classes
            'li_class_0'      => 'text-lg inline-block whitespace-nowrap text-gray-900 border-gray-900 hover:text-secondary group font-semibold my-4 lg:my-0 lg:text-sm lg:py-4 lg:relative lg:mr-6 uppercase',

            // Dropdown li classes
            'li_class_1'      => 'mt-4 text-sm text-gray-900 border-gray-900 hover:text-secondary lg:mt-0',

            // Dropdown ul classes
            'submenu_class'   => 'z-50 text-sm hidden transform bg-white leading-loose group-hover:block lg:bg-gray-100 lg:shadow-behind lg:p-6 lg:text-left lg:text-base lg:shadow-lg lg:hidden lg:absolute lg:top-12 lg:w-48 lg:max-w-3xl lg:rounded',

            'fallback_cb'     => false,

            // Custom walker
            // 'walker'          => new Finna_Nav_Menu_Walker()
        ]);
        ?>

        <div id="primary-menu-toggle-container" class="flex relative items-center">
            <!-- Desktop menu button -->
            <div data-menu-open class="hidden lg:py-4 lg:flex">
                <a href="#" aria-label="Toggle navigation" id="primary-menu-toggle" class="mr-6 font-semibold text-gray-900 uppercase border-gray-900 hover:text-secondary">
                    Menu
                </a>
            </div>

            <!-- Mobile menu button -->
            <div data-menu-hamburger class="relative w-14 h-14 rounded-full border-2 border-gray-900 cursor-pointer lg:py-4">
                <a href="#" data-menu-toggle aria-label="Toggle navigation" id="primary-menu-toggle">
                    <svg class="absolute top-1/2 left-1/2 w-6 h-6 transform -translate-x-1/2 -translate-y-1/2" viewBox="0 0 20 20" class="inline-block w-6 h-6">
                        <g stroke="none" stroke-width="1" fill="currentColor" fill-rule="evenodd">
                            <g id="icon-shape">
                                <path d="M0,3 L20,3 L20,5 L0,5 L0,3 Z M0,9 L20,9 L20,11 L0,11 L0,9 Z " id="Combined-Shape"></path>
                                <path fill="#0EA5E9" d="M0,15 L14,15 L14,17 L0,17 L0,15 Z" id="Combined-Shape"></path>
                            </g>
                        </g>
                    </svg>
                </a>
            </div>

            <!-- Menu close button -->
            <div data-menu-close class="hidden relative w-14 h-14 rounded-full border-2 border-gray-900 cursor-pointer">
                <svg class="absolute top-1/2 left-1/2 w-8 h-8 transform -translate-x-1/2 -translate-y-1/2 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>
        </div>
    </div>
</nav>
