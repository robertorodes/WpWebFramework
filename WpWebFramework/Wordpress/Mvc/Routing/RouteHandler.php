<?php

/**
 * Represents a handler to manage Wordpress hook routes.
 *
 * @since      1.0.0
 * @package    Rodes\Includes
 *
 */

namespace Rodes\WpWebFramework\Wordpress\Mvc\Routing;

if (!\class_exists('RouteHandler')) {

    class RouteHandler implements IRouteHandler
    {
        #region Attributes

        private $controller = null;
        private $action = null;

        #endregion

        #region Constructors

        public function __construct($controller, $action)
        {
            $this->setController($controller);
            $this->setAction($action);
        }

        #endregion

        #region Methods

        #endregion

        #region Properties

        public function getController()
        {
            return $this->controller;
        }

        private function setController($controller)
        {
            // TODO: Implement guards
            $this->controller = $controller;
        }

        public function getAction()
        {
            return $this->action;
        }

        private function setAction($action)
        {
            // TODO: Implement guards
            $this->action = $action;
        }

        #endregion
    }
}