<?php

/**
 * Manages the registration of scripts.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Rodes
 */

namespace Rodes\WpWebFramework\Wordpress\ResourceManagement;

if (!\interface_exists('IScriptsRegistrar')) {

    interface IScriptsRegistrar
    {
        public function registerScripts();
        public function addScript(IScript $script);
        public function addScripts(IScript ...$scripts);
        public function getScripts();
    }
}