<?php

/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string $classes String of classes.
 * @param mixed $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function finna_nav_menu_add_li_class($classes, $item, $args, $depth)
{
    if (isset($args->li_class)) {
        $classes[] = $args->li_class;
    }

    if (isset($args->{"li_class_$depth"})) {
        $classes[] = $args->{"li_class_$depth"};
    }

    return $classes;
}

add_filter('nav_menu_css_class', 'finna_nav_menu_add_li_class', 10, 4);

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string $classes String of classes.
 * @param mixed $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function finna_nav_menu_add_submenu_class($classes, $args, $depth)
{
    if (isset($args->submenu_class)) {
        $classes[] = $args->submenu_class;
    }

    if (isset($args->{"submenu_class_$depth"})) {
        $classes[] = $args->{"submenu_class_$depth"};
    }

    return $classes;
}

add_filter('nav_menu_submenu_css_class', 'finna_nav_menu_add_submenu_class', 10, 3);

/**
 * Adds a chevron svg to any parent menu items that have children.
 *
 * @since Finna 1.0
 *
 * @param stdClass $args An object of wp_nav_menu() arguments.
 * @param WP_Post $item Menu item data object.
 * @param int $depth Depth of menu item. Used for padding.
 * @return stdClass An object of wp_nav_menu() arguments.
 */
function finna_add_span_to_menu_items($args, $item, $depth)
{
    if (in_array('menu-item-has-children', $item->classes, true)) {
        $args->after = '
        <svg class="hidden -mt-1 ml-1 w-4 h-4 rounded-full border cursor-pointer lg:inline-block border-secondary" viewBox="0 0 20 20" fill="#14B8A6">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>';
    } else {
        $args->after = '';
    }

    return $args;
}

add_filter('nav_menu_item_args', 'finna_add_span_to_menu_items', 10, 3);
