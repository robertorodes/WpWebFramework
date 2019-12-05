<?php

/**
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           Rodes
 *
 * @wordpress-plugin
 * Plugin Name:       Rodes Wordpress Web Framework Plugin Sample
 * Plugin URI:        https://robertorodes.com/plugin-name-uri/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Roberto Rodes
 * Author URI:        http://robertorodes.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       rodes-wp-web-framework
 * Domain Path:       /languages
 */

namespace Rodes\WpWebFrameworkExampleApp;

use Rodes\WpWebFrameworkExampleApp\Application;


// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

require_once(dirname(__FILE__) . '/vendor/autoload.php');

\define(__NAMESPACE__ . '\PLUGIN_PATH', \plugin_dir_path(__FILE__));
\define(__NAMESPACE__ . '\PLUGIN_BASE_FOLDER', \dirname(\plugin_basename(__FILE__)));
\define(__NAMESPACE__ . '\PLUGIN_URL', \plugin_dir_url(__FILE__));
\define(__NAMESPACE__ . '\PLUGIN_START_FILE', basename(__FILE__));

/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 */
function run()
{
	/*
	 * Begins execution of the plugin.
	 *
	 * Since everything within the plugin is registered via hooks,
	 * then kicking off the plugin from this point in the file does
	 * not affect the page life cycle.
	 */
	$plugin = Application::start();
}

run();