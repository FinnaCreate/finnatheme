<?php

/**
 * Define constants.
 *
 * @package finna-starter-kit
 */

namespace Finna\Base;

class BaseController
{
    public $theme_path;

    public $theme_name;

    public $theme_url;

    public $theme_js_dir;

    public $theme_css_dir;

    public function __construct()
    {
        $this->theme_name = ucwords(str_replace("-", " ", trim(dirname(plugin_basename(dirname(__FILE__, 2))), '/')));
        $this->theme_path = plugin_dir_path(dirname(__FILE__, 2));
        $this->theme_url = plugin_dir_url(dirname(__FILE__, 2));
        $this->theme_js_dir = plugins_url('build/js/', dirname(__FILE__, 2));
        $this->theme_css_dir = plugins_url('build/css/', dirname(__FILE__, 2));
    }
}
