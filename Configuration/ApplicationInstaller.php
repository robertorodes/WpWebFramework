<?php

/**
 * ApplicationInstaller class that includes and loads dependencies and implements activation and desactivation methods
 *
 * @since      1.0.0
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 *
 */

namespace Rodes\WpWebFrameworkExampleApp\Configuration;

use Rodes\WpWebFramework\Wordpress\Configuration\IWordpressApplicationInformation;
use Rodes\WpWebFramework\Wordpress\Configuration\BaseApplicationInstaller;
use Rodes\WpWebFrameworkExampleApp\Models\Admin\AdminNoticesModel;
use Rodes\WpWebFrameworkExampleApp\Models\Admin\AdminSettingsModel;


if (!class_exists('BaseApplicationInstaller')) {

	class ApplicationInstaller extends BaseApplicationInstaller
	{
		private $applicationInformation = null;

		/**
		 * Creates an instance of this class.
		 * 
		 * @since    1.0.0
		 */
		public function __construct(IWordpressApplicationInformation $appInformation)
		{
			parent::__construct($appInformation);
		}

		/**
		 * Prepares sites to use the plugin during single or network-wide activation
		 *
		 * @since    1.0.0
		 * @param bool $network_wide
		 */
		public function activateApp($network_wide)
		{
            parent::activateApp($network_wide);

            // TODO: Consider encapsulating this call on a parent's method (it could be 'activateApp')
            register_uninstall_hook( __FILE__, __CLASS__ . '::uninstallApp' );
		}

		/**
		 * Rolls back activation procedures when de-activating the plugin
		 *
		 * @since    1.0.0
		 */
		public function deactivateApp()
		{
            parent::deactivateApp();

			// TODO: Extract this functionality into an application service so it can be reused from different adapters in our architecture.
			AdminNoticesModel::remove_admin_notices();
		}

		public static function installApp()
		{

		}

		/**
		 * Fired when user uninstalls the plugin, called in uninstall.php file
		 *
		 * @since    1.0.0
		 */
		public static function uninstallApp()
		{
			// require_once dirname(plugin_dir_path(__FILE__)) . '/includes/class-plugin-name.php';
			// require_once dirname(plugin_dir_path(__FILE__)) . '/models/class-plugin-name-model.php';
			// require_once dirname(plugin_dir_path(__FILE__)) . '/models/admin/class-plugin-name-model-admin.php';
			// require_once dirname(plugin_dir_path(__FILE__)) . '/models/admin/class-plugin-name-model-admin-settings.php';

			// TODO: Extract this functionality into an application service so it can be reused from different adapters in our architecture.
			AdminSettingsModel::delete_settings();
		}
	}

}