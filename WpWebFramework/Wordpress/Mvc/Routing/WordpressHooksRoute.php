<?php

/**
 * Default Wordpress hooks router registry.
 *
 * @since      1.0.0
 * @package    Rodes\Includes
 *
 */

namespace Rodes\WpWebFramework\Wordpress\Mvc\Routing;

use Rodes\WpWebFramework\Wordpress\Core\WordpressHook;

if (!\class_exists('WordpressHooksRoute')) {

    class WordpressHooksRoute implements IWordpressHooksRoute
    {
        #region Attributes

        private $hook = null;
        private $handlers = null;

        #endregion

        #region Constructors

        public function __construct(
            WordpressHook $routeHook,
            IRouteHandlers $routeHandlers
        )
        {
            $this->setHook($routeHook);
            $this->setHandlers($routeHandlers);
        }

        #endregion

        #region Methods

        #endregion

        #region Properties

        public function getHook()
        {
            return $this->hook;
        }

        private function setHook(WordpressHook $routeHook)
        {
            // TODO: Implement guards
            $this->hook = $routeHook;
        }

        public function getHandlers()
        {
            return $this->handlers;
        }

        private function setHandlers(IRouteHandlers $routeHandlers)
        {
            // TODO: Implement guards
            $this->handlers = $routeHandlers;
        }

        #endregion
    }
}