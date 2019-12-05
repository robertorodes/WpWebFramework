<?php

/**
 * ApplicationInstaller class that includes and loads dependencies and implements activation and desactivation methods
 *
 * @package Rodes\AppStart
 * @since   1.0.0
 *
 */

namespace Rodes\WpWebFramework\Filters;

if (!\interface_exists('IApplicationStartFilter')) {

    interface IApplicationStartFilter
    {
        public function run();
    }
}