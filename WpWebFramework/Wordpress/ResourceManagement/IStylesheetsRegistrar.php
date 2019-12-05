<?php

/**
 * Manages the registration of css stylesheets.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Rodes
 */

namespace Rodes\WpWebFramework\Wordpress\ResourceManagement;

if (!\interface_exists('IStylesheetsRegistrar')) {

    interface IStylesheetsRegistrar
    {
        public function registerStylesheets();
        public function addStylesheet(IStylesheet $stylesheet);
        public function addStylesheets(IStylesheet ...$stylesheets);
        public function getStylesheets();
    }
}