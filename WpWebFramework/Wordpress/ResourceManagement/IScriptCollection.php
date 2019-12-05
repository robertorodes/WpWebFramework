<?php

/**
 * Represents a collection of scripts.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Rodes
 */

namespace Rodes\WpWebFramework\Wordpress\ResourceManagement;

if (!\interface_exists('IScriptCollection.php')) {

    interface IScriptCollection
    {
        public function add(IScript $script);
    }
}