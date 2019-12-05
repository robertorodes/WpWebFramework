<?php

/**
 * Defines a template engine to render views.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Rodes
 */

namespace Rodes\WpWebFramework\Wordpress\Mvc;

if (!\interface_exists('ITemplateEngine')) {

    interface ITemplateEngine
    {
        public static function renderView($viewPath, $model);
    }
}