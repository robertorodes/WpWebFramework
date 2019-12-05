<?php

/**
 * Default Wordpress hooks router.
 *
 * @since      1.0.0
 * @package    Rodes\Includes
 *
 */

namespace Rodes\WpWebFramework\Wordpress\Mvc\Routing;

use Rodes\WpWebFramework\Wordpress\Core\WordpressHookId;


if (!\class_exists('WordpressHooksRouter')) {

    class WordpressHooksRouter implements IWordpressHooksRouter
    {
        #region Attributes

        private $routeRegistry = null;

        private $routeDispatcher = null;

        #endregion

        #region Constructors

        public function __construct(
            IWordpressHooksRouteRegistry $routeRegistry,
            IRouteDispatcher $routeDispatcher
        )
        {
            $this->setRouteRegistry($routeRegistry);
            $this->setRouteDispatcher($routeDispatcher);
        }

        #endregion

        #region Methods

        public function startRouting()
        {
            // Subscribe to Wordpress hooks registered in $routeRegistry 
            $this->listenToWordpressHooks();
        }

        private function listenToWordpressHooks()
        {
            foreach ($this->getRouteRegistry() as $route) {
                \add_action($route->getHook()->getId()->getValue(), array($this, 'dispatchRoute'), 10, \PHP_INT_MAX);
            }
        }

        public function dispatchRoute(...$args)
        {
            $invokedHook = \current_filter();

            $route = $this->getRouteRegistry()->matchRoute(new WordpressHookId($invokedHook));

            $requestDispatcher = $this->getRouteDispatcher();
            return $requestDispatcher->dispatch($route, ...$args);
        }

        #endregion

        #region Properties

        public function getRouteRegistry()
        {
            return $this->routeRegistry;
        }

        private function setRouteRegistry(IWordpressHooksRouteRegistry $routeRegistry)
        {
            // TODO: Implement guards
            $this->routeRegistry = $routeRegistry;
        }

        private function getRouteDispatcher()
        {
            return $this->routeDispatcher;
        }

        private function setRouteDispatcher(IRouteDispatcher $routeDispatcher)
        {
            // TODO: Implement guards
            $this->routeDispatcher = $routeDispatcher;
        }

        #endregion
    }
}