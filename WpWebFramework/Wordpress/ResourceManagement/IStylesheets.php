<?php

/**
 * Represents a collection of stylesheets.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Rodes
 */

namespace Rodes\WpWebFramework\Wordpress\ResourceManagement;

if (!\interface_exists('IStylesheets')) {

    interface IStylesheets
    {
        public function add(IStylesheet $stylesheet);
    }
}