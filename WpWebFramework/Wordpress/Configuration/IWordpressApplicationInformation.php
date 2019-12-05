<?php

/**
 * IApplicationInformation interface that defines application metadata.
 *
 * @package Rodes\AppStart
 * @since   1.0.0
 *
 */

namespace Rodes\WpWebFramework\Wordpress\Configuration;

use Rodes\WpWebFramework\Configuration\IApplicationInformation;


if (!\interface_exists('IWordpressApplicationInformation')) {

    interface IWordpressApplicationInformation extends IApplicationInformation
    {
        /**
         * Gets the required Wordpress version for this plugin application to run.
         *
         * @since    1.0.0
         * @access   private
         * @return   string The Wordpress version required.
         */
        public function getRequiredWordpressVersion();

        /**
         * Tells whether this plugin application must run under a Wordpress network.
         *
         * @since    1.0.0
         * @access   private
         * @return   bool True if a Wordpress network is required. 
         * Otherwise it returns false.
         */
        public function isWordpressNetworkRequired();
    }
}