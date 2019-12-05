<?php

/**
 * Define the routing registry functionality.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Rodes
 */

namespace Rodes\WpWebFramework\Wordpress\Mvc\Routing;

use Rodes\WpWebFramework\Wordpress\Core\WordpressHookId;

if (!\interface_exists('IWordpressHooksRouteRegistry')) {

    interface IWordpressHooksRouteRegistry
    {
        public function addRoute(IWordpressHooksRoute $route);
        public function addRoutes(IWordpressHooksRoute ...$routes);
        public function matchRoute(WordpressHookId $hookId);
    }
}