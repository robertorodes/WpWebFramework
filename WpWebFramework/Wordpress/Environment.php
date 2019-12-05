<?php
namespace Rodes\WpWebFramework\Wordpress;

if (!class_exists('Environment')) {

    class Environment
    {
        const PHP_VERSION = \PHP_VERSION;

        public static function getWordpressVersion() 
        {
            global $wp_version;

            return $wp_version;
        }

        public static function isMultisite()
        {
            return \is_multisite();
        }
    }
}