<?php

/**
 * Defines the common stylesheets used by the application.
 *
 * @since      1.0.0
 * @package    Rodes\Configuration
 *
 */

namespace Rodes\WpWebFrameworkExampleApp\Configuration;

use Rodes\WpWebFramework\Wordpress\ResourceManagement\IStylesheets;
use Rodes\WpWebFramework\Wordpress\ResourceManagement\Stylesheet;
use Rodes\WpWebFramework\Configuration\IApplicationConfiguration;


if (!class_exists('StylesheetConfig')) {

    class StylesheetConfig
    {
        #region Constants

        const STYLES_RELATIVE_FOLDER_PATH = 'css/';

        #endregion

        #region Static methods

        public static function ConfigureStylesheets(IApplicationConfiguration $appConfiguration, IStylesheets $stylesheets)
        {
            // TODO: Implement guards

            $appInformation = $appConfiguration->getApplicationInformation();

            $stylesheets->add(
                new Stylesheet(
                    $appInformation->getApplicationId(),
                    $appInformation->getApplicationUrl() . self::STYLES_RELATIVE_FOLDER_PATH . $appInformation->getApplicationId() . '.css',
                    array(),
                    $appInformation->getApplicationVersion(),
                    'all'
                )
            );
        }

        #endregion
    }
}