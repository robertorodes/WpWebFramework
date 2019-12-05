<?php

/**
 * Loads the global application configuration.
 *
 * @since      1.0.0
 * @package    Rodes\Configuration
 *
 */

namespace Rodes\WpWebFrameworkExampleApp\Configuration;

use Rodes\WpWebFramework\Configuration\ApplicationConfiguration;
use Rodes\WpWebFramework\Wordpress\Configuration\WordpressApplicationInformation;


if (!class_exists('AppConfig')) {

    class AppConfig
    {
        #region Static methods

        public static function GetConfiguration()
        {
            return new ApplicationConfiguration(
                new WordpressApplicationInformation(
                    'rodes-wp-web-framework-sample',
                    'Rodes Wordpress Web Framework Sample',
                    '1.0.0',
                    \Rodes\WpWebFrameworkExampleApp\PLUGIN_PATH,
                    \Rodes\WpWebFrameworkExampleApp\PLUGIN_URL,
                    \Rodes\WpWebFrameworkExampleApp\PLUGIN_BASE_FOLDER,
                    \Rodes\WpWebFrameworkExampleApp\PLUGIN_START_FILE,
                    '5.6.0',
                    '3.0',
                    false
                )
            );
        }

        #endregion
    }
}