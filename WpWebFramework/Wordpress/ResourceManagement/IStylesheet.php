<?php

/**
 * Represents a css stylesheet.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Rodes
 */

namespace Rodes\WpWebFramework\Wordpress\ResourceManagement;

if (!\interface_exists('IStylesheet')) {

    interface IStylesheet
    {
        public function getId();
        public function getSourcePath();
        public function getDependencies();
        public function getVersion();
        public function getMedia();
    }
}