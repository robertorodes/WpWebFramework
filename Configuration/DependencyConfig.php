<?php

/**
 * Defines the dependencies required for the application to run.
 *
 * @since      1.0.0
 * @package    Rodes\Configuration
 *
 */

namespace Rodes\WpWebFrameworkExampleApp\Configuration;

use \DI;
use \DI\Scope;
use \DI\ContainerBuilder;

// Configuration
use \Rodes\WpWebFramework\Configuration\IApplicationConfiguration;
use \Rodes\WpWebFramework\Wordpress\Configuration\IWordpressApplicationInformation;

// Application start filters
use \Rodes\WpWebFramework\Filters\RequirementsCheckerBaseFilter;

// Routing
use \Rodes\WpWebFramework\Wordpress\Mvc\Routing\IWordpressHooksRouteRegistry;
use \Rodes\WpWebFramework\Wordpress\Mvc\Routing\WordpressHooksRouteRegistry;
use \Rodes\WpWebFramework\Wordpress\Mvc\Routing\IRouteDispatcher;
use \Rodes\WpWebFramework\Wordpress\Mvc\Routing\RouteDispatcher;
use \Rodes\WpWebFramework\Wordpress\Mvc\Routing\IWordpressHooksRouter;
use \Rodes\WpWebFramework\Wordpress\Mvc\Routing\WordpressHooksRouter;

// Resource management
use Rodes\WpWebFramework\Wordpress\ResourceManagement\IStylesheets;
use Rodes\WpWebFramework\Wordpress\ResourceManagement\Stylesheets;
use Rodes\WpWebFramework\Wordpress\ResourceManagement\IStylesheetsRegistrar;
use Rodes\WpWebFramework\Wordpress\ResourceManagement\StylesheetsRegistrar;
use Rodes\WpWebFramework\Wordpress\ResourceManagement\IScriptCollection;
use Rodes\WpWebFramework\Wordpress\ResourceManagement\ScriptCollection;
use Rodes\WpWebFramework\Wordpress\ResourceManagement\IScriptsRegistrar;
use Rodes\WpWebFramework\Wordpress\ResourceManagement\ScriptsRegistrar;

// Internationalization
use Rodes\WpWebFramework\Globalization\IGlobalizationManager;
use Rodes\WpWebFramework\Wordpress\Globalization\WordpressGlobalizationManager;


if (!class_exists('DependencyConfig')) {

    class DependencyConfig
    {
        #region Static methods

        public static function ConfigureDependencies(IApplicationConfiguration $appConfiguration, ContainerBuilder $containerBuilder)
        {
            // TODO: Implement guards

            $containerBuilder->useAnnotations(false);
            $containerBuilder->addDefinitions([
                
                // Application
                // ApplicationInformation::class =>
                //     DI\object()
                //     ->constructor('rodes-wp-web-framework-sample', 'Rodes Wordpress Web Framework Sample', '1.0.0', '5.6.0', '3.0', false),
                // IApplicationInformation::class =>
                //     DI\object(ApplicationInformation::class),
                // IApplicationInformation::class =>
                //     function () {
                //         return $appConfiguration->getApplicationInformation();
                //     },
                IWordpressApplicationInformation::class => $appConfiguration->getApplicationInformation(),
                RequirementsCheckerBaseFilter::class => DI\object(RequirementsChecker::class),

                // IApplicationConfiguration::class =>
                //     DI\object(ApplicationConfiguration::class),
                // IApplicationConfiguration::class =>
                //     function () {
                //         return $appConfiguration;
                //     },
                IApplicationConfiguration::class => $appConfiguration,
                IWordpressHooksRouteRegistry::class =>
                    function () {
                        return new WordpressHooksRouteRegistry();
                    },
                IRouteDispatcher::class => DI\object(RouteDispatcher::class),
                IWordpressHooksRouter::class => DI\object(WordpressHooksRouter::class),
                IStylesheets::class =>
                    function () {
                        return new Stylesheets();
                    },
                // IStylesheets::class => DI\object(Stylesheets::class),
                IStylesheetsRegistrar::class => DI\object(StylesheetsRegistrar::class),
                IScriptCollection::class => 
                    function () {
                        return new ScriptCollection();
                    },
                IScriptsRegistrar::class => DI\object(ScriptsRegistrar::class),
                // TODO: Uncouple the following dependency
                // IGlobalizationManager::class => DI\object(WordpressGlobalizationManager::class)->constructor('rodes-wp-web-framework', Environment::getApplicationBaseFolder() . '/languages/'),
                IGlobalizationManager::class => 
                    DI\object(WordpressGlobalizationManager::class)
                        ->constructor(
                            $appConfiguration->getApplicationInformation()->getApplicationId(), 
                            $appConfiguration->getLocalesBaseFolder()
                        ),
                Application::class => DI\object(Application::class)

                // Controllers
            ]);

            self::ConfigureCustomDependencies($appConfiguration, $containerBuilder);
        }

        private static function ConfigureCustomDependencies(IApplicationConfiguration $appConfiguration, ContainerBuilder $containerBuilder) {

            // Add your additional custom dependencies here
        }

        #endregion
    }
}