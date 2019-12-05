<?php

/**
 * Requirements checker class that checks application requirements.
 *
 * @package Rodes\Configuration
 * @since   1.0.0
 *
 */

namespace Rodes\WpWebFrameworkExampleApp\Configuration;

use Rodes\WpWebFramework\Filters\RequirementsCheckerBaseFilter;
use Rodes\WpWebFramework\Wordpress\Environment;
use Rodes\WpWebFramework\Wordpress\Configuration\IWordpressApplicationInformation;


if (!class_exists('RequirementsChecker')) {

    class RequirementsChecker extends RequirementsCheckerBaseFilter
    {
        public function __construct(IWordpressApplicationInformation $applicationInformation)
        {
            parent::__construct($applicationInformation);
        }

        /**
         * Checks if the system requirements are met
         *
         * @since  1.0.0
         * @return bool True if system requirements are met, false if not
         */
        protected function requirementsMet()
        {
            global $wp_version;

            if (version_compare(Environment::PHP_VERSION, 
                $this->getApplicationInformation()->getRequiredPhpVersion(), 
                '<')) {
                return false;
            }
            if (version_compare(Environment::getWordpressVersion(), 
                $this->getApplicationInformation()->getRequiredWordpressVersion(), 
                '<')) {
                return false;
            }
            if (Environment::isMultisite() != $this->getApplicationInformation()->isWordpressNetworkRequired()) {
                return false;
            }

            return true;
        }

        /**
         * Prints an error that the system requirements weren't met.
         *
         * @since 1.0.0
         */
        protected function showRequirementsError()
        {
            parent::showRequirementsError();
        }
    }
}