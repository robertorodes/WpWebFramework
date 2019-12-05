<?php

/**
 * IApplicationInformation interface that defines application metadata.
 *
 * @package Rodes\AppStart
 * @since   1.0.0
 *
 */

namespace Rodes\WpWebFramework\Configuration;

if (!\interface_exists('IApplicationInformation')) {

    interface IApplicationInformation
    {
        public function getApplicationId();
        public function getApplicationName();
        public function getApplicationVersion();
        public function getApplicationPath();
        public function getApplicationUrl();
        public function getApplicationBaseFolder();
        public function getApplicationStartFileName();
        public function getApplicationStartFilePath();

        /**
         * Gets the required PHP version for this plugin application to run.
         *
         * @since    1.0.0
         * @access   private
         * @return   string The PHP version required.
         */
        public function getRequiredPhpVersion();
    }
}