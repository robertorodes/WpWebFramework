<?php

/**
 * Define the routing functionality.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Rodes
 */

namespace Rodes\WpWebFramework\Wordpress\Mvc\Routing;

if (!\interface_exists('IRouter')) {

    interface IWordpressHooksRouter
    {
        public function startRouting();
        public function getRouteRegistry();
    }
}