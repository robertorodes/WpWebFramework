<?php

/**
 * Defines the functionality to run specific controller actions in response to matching routes.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Rodes
 */

namespace Rodes\WpWebFramework\Wordpress\Mvc\Routing;

use DI\Container;
use Rodes\WpWebFramework\Wordpress\Core\HookTypes;


if (!\class_exists('RouteDispatcher')) {

    class RouteDispatcher implements IRouteDispatcher
    {
        #region Attributes

        private $dependencyContainer = null;

        #endregion

        #region Constructors

        public function __construct(Container $dependencyContainer)
        {
            $this->setDependencyContainer($dependencyContainer);
        }

        #endregion

        #region Methods

        public function dispatch(IWordpressHooksRoute $route, ...$args)
        {
            // TODO: Implement guards

            // Optional: Run action filters (before)
            $result = null;

            if ($route->getHook()->getType()->getValue() === HookTypes::Action) {
                $this->dispatchAction($route, ...$args);
            } else if ($route->getHook()->getType()->getValue() === HookTypes::Filter) {
                // TODO: Check if $args[0] is set.
                $result = $this->dispatchFilter($route, ...$args);
            }

            // Optional: Run action filters (after)

            return $result;
        }

        private function dispatchAction(IWordpressHooksRoute $route, ...$args)
        {
            $routeHandlers = $route->getHandlers();
            foreach($routeHandlers as $handler) {
                
                // Create controller instance
                $controller = $this->getDependencyContainer()->get($handler->getController());

                // Run controller action
                call_user_func(array($controller, $handler->getAction()), ...$args);            
            }
        }

        private function dispatchFilter(IWordpressHooksRoute $route, ...$args)
        {
            $routeHandlers = $route->getHandlers();
            foreach($routeHandlers as $handler) {
                
                // Create controller instance
                $controller = $this->getDependencyContainer()->get($handler->getController());

                // Run controller action
                $args[0] = call_user_func(array($controller, $handler->getAction()), ...$args);            
            }

            return $args[0];
        }

        #endregion

        #region Properties

        private function getDependencyContainer()
        {
            return $this->dependencyContainer;
        }

        private function setDependencyContainer(Container $dependencyContainer)
        {
            // TODO: Implement guards
            $this->dependencyContainer = $dependencyContainer;
        }

        #endregion
    }
}