<?php

/**
 * Defines the common scripts used by the application.
 *
 * @since      1.0.0
 * @package    Rodes\Configuration
 *
 */

namespace Rodes\WpWebFrameworkExampleApp\Configuration;

use Rodes\WpWebFramework\Wordpress\ResourceManagement\IScriptCollection;
use Rodes\WpWebFramework\Wordpress\ResourceManagement\Script;
use Rodes\WpWebFramework\Configuration\IApplicationConfiguration;


if (!class_exists('ScriptConfig')) {

    class ScriptConfig
    {
        #region Constants

        const SCRIPTS_RELATIVE_FOLDER_PATH = 'js/';

        #endregion

        #region Static methods

        public static function ConfigureScripts(IApplicationConfiguration $appConfiguration, IScriptCollection $scripts)
        {
            // TODO: Implement guards

            $appInformation = $appConfiguration->getApplicationInformation();

            $scripts->add(
                new Script(
                    $appInformation->getApplicationId(),
                    $appInformation->getApplicationUrl() . self::SCRIPTS_RELATIVE_FOLDER_PATH . $appInformation->getApplicationId() . '.js',
                    array('jquery'),
                    $appInformation->getApplicationVersion(),
                    false
                )
            );
        }

        #endregion
    }
}