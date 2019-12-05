<?php

/**
 * The core plugin class.
 *
 * @since      1.0.0
 * @package    Rodes\Includes
 *
 */

namespace Rodes\WpWebFrameworkExampleApp;

use Rodes\WpWebFrameworkExampleApp\Includes\HooksManager;

use Rodes\WpWebFramework\Wordpress\Plugins\ProductVendors\Actions;
use Rodes\WpWebFrameworkExampleApp\Controllers\HomeController;
use Rodes\WpWebFrameworkExampleApp\Controllers\Admin\AdminSettingsController;
use Rodes\WpWebFrameworkExampleApp\Controllers\Admin\AdminNoticesController;

use Rodes\WpWebFramework\Configuration\IApplicationConfiguration;
use Rodes\WpWebFramework\Wordpress\Mvc\Routing\IWordpressHooksRouter;
use Rodes\WpWebFramework\Wordpress\ResourceManagement\IStylesheetsRegistrar;
use Rodes\WpWebFramework\Wordpress\ResourceManagement\IScriptsRegistrar;
use Rodes\WpWebFramework\Globalization\IGlobalizationManager;

use Rodes\WpWebFrameworkExampleApp\Configuration\AppConfig;
use Rodes\WpWebFrameworkExampleApp\Configuration\DependencyConfig;
use Rodes\WpWebFrameworkExampleApp\Configuration\RouteConfig;
use Rodes\WpWebFrameworkExampleApp\Configuration\ScriptConfig;
use Rodes\WpWebFrameworkExampleApp\Configuration\StylesheetConfig;
use Rodes\WpWebFrameworkExampleApp\Configuration\ApplicationInstaller;
use Rodes\WpWebFramework\Filters\RequirementsCheckerBaseFilter;


if (!class_exists('Application')) {

	class Application
	{

		/**
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      Application    $instance    Instance of this class.
		 */
		private static $instance;

		/**
		 * The modules variable holds all modules of the plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      object    $modules    Maintains all modules of the plugin.
		 */
		private static $modules = array();

		/**
		 * Main plugin path /wp-content/plugins/<plugin-folder>/.
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      string    $plugin_path    Main path.
		 */
		private static $plugin_path;

		/**
		 * Absolute plugin url <wordpress-root-folder>/wp-content/plugins/<plugin-folder>/.
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      string    $plugin_url    Main path.
		 */
		private static $plugin_url;


		/**
		 * The unique identifier of this plugin.
		 *
		 * @since    1.0.0
		 */
		const PLUGIN_ID = 'rodes-wp-web-framework-sample';

		/**
		 * The name identifier of this plugin.
		 *
		 * @since    1.0.0
		 */
		const PLUGIN_NAME = 'Rodes Wordpress Web Framework Sample';


		/**
		 * The current version of the plugin.
		 *
		 * @since    1.0.0
		 */
		const PLUGIN_VERSION = '1.0.0';

		private $configuration = null;

		private $requirementsChecker = null;

		private $wordpressHooksRouter = null;

		private $stylesheetsRegistrar = null;

		private $scriptsRegistrar = null;

		private $globalizationManager = null;

		/**
		 * Provides access to a single instance of a module using the singleton pattern
		 *
		 * @return object
		 *
		 * @since    1.0.0
		 */
		private static function get_instance()
		{
			if (null === self::$instance) {

				$builder = new \DI\ContainerBuilder();
				DependencyConfig::ConfigureDependencies(AppConfig::GetConfiguration(), $builder);
				$container = $builder->build();

				self::$instance = $container->get(self::class);
			}

			return self::$instance;
		}

		public static function start()
		{
			$instance = self::get_instance();
			$instance->run();
		}

		/**
		 * Define the core functionality of the plugin.
		 *
		 * Load the dependencies, define the locale, and set the hooks for the admin area and
		 * the public-facing side of the site.
		 *
		 * @since    1.0.0
		 */
		public function __construct(
			IApplicationConfiguration $configuration,
			RequirementsCheckerBaseFilter $requirementsChecker,
			IWordpressHooksRouter $wordpressHooksRouter,
			IStylesheetsRegistrar $stylesheetsRegistrar,
			IScriptsRegistrar $scriptsRegistrar,
			IGlobalizationManager $globalizationManager
		)
		{
			$this->setConfiguration($configuration);
			$this->setRequirementsChecker($requirementsChecker);
			$this->setWordpressHooksRouter($wordpressHooksRouter);
			$this->setStylesheetsRegistrar($stylesheetsRegistrar);
			$this->setScriptsRegistrar($scriptsRegistrar);
			$this->setGlobalizationManager($globalizationManager);

			// Configure routes
			RouteConfig::ConfigureRoutes($wordpressHooksRouter->getRouteRegistry());
			$wordpressHooksRouter->startRouting();

			// Register CSS stylesheets
			StylesheetConfig::ConfigureStylesheets($configuration, $stylesheetsRegistrar->getStylesheets());
			$stylesheetsRegistrar->registerStylesheets();

			// Register client side scripts
			ScriptConfig::ConfigureScripts($configuration, $scriptsRegistrar->getScripts());
			$scriptsRegistrar->registerScripts();
		}

		private function run()
		{
			if ($this->getRequirementsChecker()->run()) {
				self::$plugin_path = plugin_dir_path(dirname(__FILE__));
				self::$plugin_url = plugin_dir_url(dirname(__FILE__));

				self::$modules['ApplicationInstaller'] = new ApplicationInstaller($this->getConfiguration()->getApplicationInformation());
				//self::$modules['HomeController'] = HomeController::get_instance();
				self::$modules['AdminSettingsController'] = AdminSettingsController::get_instance();
				self::$modules['AdminNoticesController'] = AdminNoticesController::get_instance();

				HooksManager::init_actions_filters();
			}
		}

		/**
		 * Gets plugin's absolute path.
		 *
		 * @since    1.0.0
		 */
		public static function get_plugin_path()
		{
			return isset(self::$plugin_path) ? self::$plugin_path : plugin_dir_path(dirname(__FILE__));
		}

		/**
		 * Gets plugin's absolute url.
		 *
		 * @since    1.0.0
		 */
		public static function get_plugin_url()
		{
			return isset(self::$plugin_url) ? self::$plugin_url : plugin_dir_url(dirname(__FILE__));
		}

		/**
		 * Gets the configuration of the application.
		 * 
		 * @since 1.0.0
		 * @return IApplicationConfiguration Application configuration.
		 */
		private function getConfiguration()
		{
			return $this->configuration;
		}

		private function setConfiguration(IApplicationConfiguration $configuration)
		{
			// TODO: Implement guards
			$this->configuration = $configuration;
		}

		private function getRequirementsChecker()
		{
			return $this->requirementsChecker;
		}

		private function setRequirementsChecker(RequirementsCheckerBaseFilter $requirementsChecker)
		{
			//TODO: Assert argument not null
			$this->requirementsChecker = $requirementsChecker;
		}

		private function getWordpressHooksRouter()
		{
			return $this->wordpressHooksRouter;
		}

		private function setWordpressHooksRouter($wordpressHooksRouter)
		{
			// TODO: Implement guards
			$this->wordpressHooksRouter = $wordpressHooksRouter;
		}

		private function getStylesheetsRegistrar()
		{
			return $this->stylesheetsRegistrar;
		}

		private function setStylesheetsRegistrar(IStylesheetsRegistrar $stylesheetsRegistrar)
		{
			// TODO: Implement guards
			$this->stylesheetsRegistrar = $stylesheetsRegistrar;
		}

		private function getScriptsRegistrar()
		{
			return $this->scriptsRegistrar;
		}

		private function setScriptsRegistrar(IScriptsRegistrar $scriptsRegistrar)
		{
			// TODO: Implement guards
			$this->scriptsRegistrar = $scriptsRegistrar;
		}

		private function getGlobalizationManager()
		{
			return $this->globalizationManager;
		}

		private function setGlobalizationManager(IGlobalizationManager $globalizationManager)
		{
			// TODO: Implement guards
			$this->globalizationManager = $globalizationManager;
		}
	}
}