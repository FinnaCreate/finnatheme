<?php

/**
 * SVG Icons class
 *
 * @package WordPress
 * @subpackage Finna
 * @since Finna 1.0
 */

/**
 * This class is in charge of displaying social icons in the mobile nav menu modal.
 *
 * @since Finna 1.0
 */
class Finna_Nav_Menu_Walker extends Walker_Nav_Menu
{
    /**
     * User Interface icons – svg sources.
     *
     * @since Finna 1.0
     *
     * @var array
     */
    protected static $icons = [
        'chevron' => '<svg class="hidden -mt-1 ml-1 w-4 h-4 rounded-full border cursor-pointer lg:inline-block border-finna-red" viewBox="0 0 20 20" fill="#FF0017"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>'
    ];

    function end_lvl(&$output, $depth = 0, $args = null)
    {
        $output .= '</ul>' . self::$icons['chevron'];

        return $output;
    }
}
