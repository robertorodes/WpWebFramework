<?php

/**
 * Default Wordpress hooks router registry.
 *
 * @since      1.0.0
 * @package    Rodes\Includes
 *
 */

namespace Rodes\WpWebFramework\Wordpress\Mvc\Routing;

use Rodes\Collections\GenericCollection;
use Rodes\WpWebFramework\Wordpress\Core\WordpressHookId;

if (!\class_exists('WordpressHooksRouteRegistry')) {

    final class WordpressHooksRouteRegistry 
        extends GenericCollection
        implements IWordpressHooksRouteRegistry
    {
        #region Attributes

        private $searchIndex = null;

        #endregion

        #region Constructors

        public function __construct(IWordpressHooksRoute ...$routes)
        {
            //parent::__construct($routes);
            parent::__construct();
            $this->searchIndex = array();

            foreach ($routes as $route) {
                $this->addRoute($route);
            }
        }

        #endregion

        #region Methods

        public function addRoute(IWordpressHooksRoute $route)
        {
            // TODO: Implement guards

            if (!\array_key_exists($route->getHook()->getId()->getValue(), $this->getSearchIndex())) {
                //Create new route
                $values = &$this->getValues();
                $searchIndex = &$this->getSearchIndex();
                $values[] = $route;
                $searchIndex[$route->getHook()->getId()->getValue()] = $route;
            } else {
                // Add new handlers to existing route
                $existingRoute = $this->getSearchIndex()[$route->getHook()->getId()->getValue()];
                throw new \Exception(__('There is already a route defined for the same hook.'));
            }
        }

        public function addRoutes(IWordpressHooksRoute ...$routes)
        {
            foreach ($routes as $route) {
                $this->addRoute($route);
            }
        }

        public function matchRoute(WordpressHookId $routeHookId)
        {
            if (\array_key_exists($routeHookId->getValue(), $this->getSearchIndex())) {
                return $this->searchIndex[$routeHookId->getValue()];
            } else {
                return null;
            }
        }

        #endregion

        #region Properties

        private function &getSearchIndex()
        {
            return $this->searchIndex;
        }

        #endregion
    }
}