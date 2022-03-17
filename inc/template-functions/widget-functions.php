<?php

// Register widget for social icons
function finna_widget_area()
{
    register_sidebar(
        [
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => '',
            'name' => 'Mobile Menu Modal Social Links Area',
            'id' => 'mob-menu-socials',
            'description' => 'Mobile Menu Modal Social Links'
        ]
    );
}

add_action('widgets_init', 'finna_widget_area');
