<?php

/**
 * Represents the functionality to run specific controller actions in response to matching routes.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Rodes
 */

namespace Rodes\WpWebFramework\Wordpress\Mvc\Routing;

if (!\interface_exists('IRouteDispatcher')) {

    interface IRouteDispatcher
    {
        public function dispatch(IWordpressHooksRoute $route, ...$args);
    }
}