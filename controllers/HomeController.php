<?php
use Composer\Installers\Plugin;

/**
 * Controller class that implements Plugin public side controller class
 *
 * @since      1.0.0
 * @package    Plugin_Name
 * @subpackage Plugin_Name/controllers
 *
 */

namespace Rodes\WpWebFrameworkExampleApp\Controllers;

use Rodes\WpWebFrameworkExampleApp\Application;
use Rodes\WpWebFrameworkExampleApp\Includes\HooksManager;
use Rodes\WpWebFramework\Wordpress\Mvc;

if (!class_exists('HomeController')) {

	class HomeController extends Mvc\Controller
	{

		/**
		 * Constructor
		 *
		 * @since    1.0.0
		 */
		public function __construct()
		{

		}

		public function GetSoldByText($text)
		{
			return __('with ', 'rodes-wp-web-framework');
		}

		public function GetConcatText($text)
		{
			return $text . __('the presence of ', 'rodes-wp-web-framework');
		}

		public function ShowPage()
		{
			$this->renderView('ShowPage');
		}

		public function Shutdown()
		{
			echo '<h1>Shutting down...</h1>';
		}

		public function GetProductSections($located, $template_name, $args, $template_path, $default_path)
		{
			// if ($template_name === "single-product/tabs/tabs.php")
			// {
			// 	return $this->getViewPath('ProductSections');
			// }
			// else
			// {
			// 	return $located;
			// }
			return $located;
		}
	}
}