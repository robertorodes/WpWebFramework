<?php

/**
 * Represents a globalization manager that provides i18n features.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Rodes
 */

namespace Rodes\WpWebFramework\Globalization;

if (!\interface_exists('IGlobalizationManager')) {

    interface IGlobalizationManager
    {
        public function getTextDomain();
        public function getLocalesRelativePath();
    }
}