<?php

/**
 * Represents a wordpress hooks route.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Rodes
 */

namespace Rodes\WpWebFramework\Wordpress\Mvc\Routing;

if (!\interface_exists('IWordpressHooksRoute')) {

    interface IWordpressHooksRoute
    {
        public function getHook();
        public function getHandlers();
    }
}