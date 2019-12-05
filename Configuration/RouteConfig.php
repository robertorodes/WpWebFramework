<?php

/**
 * Defines the Wordpress hook routes for the application.
 *
 * @since      1.0.0
 * @package    Rodes\Configuration
 *
 */

namespace Rodes\WpWebFrameworkExampleApp\Configuration;

use Rodes\WpWebFramework\Wordpress\Mvc\Routing\IWordpressHooksRouteRegistry;
use Rodes\WpWebFramework\Wordpress\Mvc\Routing\WordpressHooksRoute;
use Rodes\WpWebFramework\Wordpress\Mvc\Routing\RouteHandlers;
use Rodes\WpWebFramework\Wordpress\Mvc\Routing\RouteHandler;


use Rodes\WpWebFramework\Wordpress;
use Rodes\WpWebFramework\Wordpress\Core\HookTypes;
use Rodes\WpWebFramework\Wordpress\Core\WordpressHook;
use Rodes\WpWebFramework\Wordpress\Core\WordpressHookId;
use Rodes\WpWebFramework\Wordpress\Core\WordpressHookType;
use Rodes\WpWebFramework\Wordpress\Plugins\Woocommerce;
use Rodes\WpWebFramework\Wordpress\Plugins\ProductVendors;

use Rodes\WpWebFrameworkExampleApp\Controllers\HomeController;


if (!class_exists('RouteConfig')) {

    class RouteConfig
    {
        #region Static methods

        public static function ConfigureRoutes(IWordpressHooksRouteRegistry $routeRegistry)
        {
            // TODO: Implement guards
            $routeRegistry->addRoutes(
                new WordpressHooksRoute(
                    new WordpressHook(
                        new WordpressHookId(ProductVendors\Filters::SoldByText), 
                        new WordpressHookType(HookTypes::Filter)
                    ),
                    new RouteHandlers(
                        new RouteHandler(HomeController::class, 'GetSoldByText'),
                        new RouteHandler(HomeController::class, 'GetConcatText')
                    )
                ),
                new WordpressHooksRoute(
                    new WordpressHook(
                        new WordpressHookId(Woocommerce\Filters::GetTemplate), 
                        new WordpressHookType(HookTypes::Filter)
                    ),
                    new RouteHandlers(
                        new RouteHandler(HomeController::class, 'GetProductSections')
                    )
                ) 
                // new WordpressHooksRoute(
                //     new WordpressHook(
                //         new WordpressHookId('shutdown'), 
                //         new WordpressHookType(HookTypes::Action)
                //     ),
                //     new RouteHandlers(
                //         new RouteHandler(HomeController::class, 'Shutdown')
                //     )
                // )   
                // new WordpressHooksRoute(
                //     new WordpressHook(
                //         new WordpressHookId(Wordpress\Core\Actions::TemplateRedirect), 
                //         new WordpressHookType(HookTypes::Action)
                //     ),
                //     new RouteHandlers(
                //         new RouteHandler(HomeController::class, 'ShowPage')
                //     )
                // )
            );
        }

        #endregion
    }
}