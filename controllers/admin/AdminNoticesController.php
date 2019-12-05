<?php

/**
 * Controller class that implements Plugin Admin Notices messages
 *
 * @since      1.0.0
 * @package    Plugin_Name
 * @subpackage Plugin_Name/controllers/admin
 *
 */

namespace Rodes\WpWebFrameworkExampleApp\Controllers\Admin;

use Rodes\WpWebFrameworkExampleApp\Includes\HooksManager;
use Rodes\WpWebFrameworkExampleApp\Models\Admin\AdminNoticesModel;

if ( ! class_exists( 'AdminNoticesController' ) ) {

	class AdminNoticesController extends AdminSettingsController {

		/**
		 * Constructor
		 *
		 * @since    1.0.0
		 */
		public function __construct() {

			$this->register_hook_callbacks();
			$this->model = AdminNoticesModel::get_instance();

		}

		/**
		 * Register callbacks for actions and filters
		 *
		 * @since    1.0.0
		 */
		protected function register_hook_callbacks() {

			HooksManager::add_action( 'admin_notices', $this, 'show_admin_notices' );

		}

		/**
		 * Show admin notices
		 *
		 * @since    1.0.0
		 */
		public function show_admin_notices() {

			return static::get_model()->show_admin_notices();

		}

		/**
		 * Add admin notices
		 *
		 * @since    1.0.0
		 */
		public static function add_admin_notice( $notice_text ) {

			$notice = static::render_template(
				'errors/admin-notice.php',
				array(
					'admin_notice' => esc_attr( $notice_text )
				)
			);

			return static::get_model()->add_admin_notice( $notice );

		}
	
	}

}