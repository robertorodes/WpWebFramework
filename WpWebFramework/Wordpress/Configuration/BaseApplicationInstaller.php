<?php

/**
 * ApplicationInstaller class that includes and loads dependencies and implements activation and desactivation methods
 *
 * @since      1.0.0
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 *
 */

namespace Rodes\WpWebFramework\Wordpress\Configuration;

use Rodes\WpWebFramework\Wordpress\Configuration\IWordpressApplicationInformation;
use Rodes\Models\Admin\AdminNoticesModel;
use Rodes\Models\Admin\AdminSettingsModel;


if (!class_exists('BaseApplicationInstaller')) {

	abstract class BaseApplicationInstaller implements IApplicationInstaller
	{
		private $applicationInformation = null;

		/**
		 * Creates an instance of this class.
		 * 
		 * @since    1.0.0
		 */
		public function __construct(IWordpressApplicationInformation $appInformation)
		{
			$this->setApplicationInformation($appInformation);
			$this->registerHookCallbacks();
		}

		/**
		 * Register callbacks for actions and filters required for the different application
		 * setup transitions that must be supported (installation, uninstallation, 
		 * activation and deactivation).
		 *
		 * @since    1.0.0.0
		 */
		private function registerHookCallbacks()
		{
			$startPluginFilePath = $this->getApplicationInformation()->getApplicationStartFilePath();

			register_activation_hook($startPluginFilePath, array($this, 'activateApp'));
			register_deactivation_hook($startPluginFilePath, array($this, 'deactivateApp'));
		}

		/**
		 * Prepares sites to use the plugin during single or network-wide activation
		 *
		 * @since    1.0.0
		 * @param bool $network_wide
		 */
		public function activateApp($network_wide)
		{
			
		}

		/**
		 * Rolls back activation procedures when de-activating the plugin
		 *
		 * @since    1.0.0
		 */
		public function deactivateApp()
		{
			
		}

		/**
		 * Gets the application information metadata.
		 * 
		 * @since 1.0.0
		 * @return IApplicationInformation Application information.
		 */
		protected function getApplicationInformation()
		{
			return $this->applicationInformation;
		}

		private function setApplicationInformation(IWordpressApplicationInformation $appInformation)
		{
			// TODO: Assert argument is not null and typing.
			$this->applicationInformation = $appInformation;
		}
	}

}