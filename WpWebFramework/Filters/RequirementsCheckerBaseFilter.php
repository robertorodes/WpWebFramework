<?php

/**
 * Requirements checker class that checks application requirements.
 *
 * @package Rodes\AppStart
 * @since   1.0.0
 *
 */

namespace Rodes\WpWebFramework\Filters;

use Rodes\WpWebFramework\Wordpress\Environment;
use Rodes\WpWebFramework\Wordpress\Configuration\IWordpressApplicationInformation;


if (!class_exists('RequirementsCheckerBaseFilter')) {

    abstract class RequirementsCheckerBaseFilter implements IApplicationStartFilter
    {
        /* PRIVATE ATTRIBUTES */
        private $applicationInformation;

        public function __construct(IWordpressApplicationInformation $applicationInformation)
        {
            $this->setApplicationInformation($applicationInformation);
        }

        /**
         * Checks if the system requirements are met
         *
         * @since  1.0.0
         * @return bool True if system requirements are met, false if not
         */
        abstract protected function requirementsMet();

        /**
         * Prints an error that the system requirements weren't met.
         *
         * @since 1.0.0
         */
        protected function showRequirementsError()
        {
            // TODO: Remove $wp_version and the rest of variables in the view (take them from the Environment class)
            global $wp_version;
            require_once(dirname(__FILE__) . '/views/admin/errors/requirements-error.php');
        }

        public function run()
        {
            $result = true;

            if (!$this->requirementsMet()) {
                $result = false;
                add_action('admin_notices', 'show_requirements_error');
                require_once(ABSPATH . 'wp-admin/includes/plugin.php');
                deactivate_plugins(plugin_basename(__FILE__));
            }

            return $result;
        }

        /**
		 * Gets the application configuration.
		 *
		 * @since    1.0.0
		 * @access   private
		 * @return   IWordpressApplicationInformation The collection of actions and filters registered with WordPress.
		 */
        protected function getApplicationInformation() 
        {
            return $this->applicationInformation;
        }

        protected function setApplicationInformation(IWordpressApplicationInformation $applicationInformation)
        {
            //TODO: Assert argument is not null
            $this->applicationInformation = $applicationInformation;
        }
    }
}