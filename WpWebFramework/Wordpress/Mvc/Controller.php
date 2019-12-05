<?php

/**
 * Abstract class to define/implement base methods for all controller classes.
 *
 * @since      1.0.0
 * @package    Rodes\WpWebFramework\Wordpress\Mvc
 *
 */

namespace Rodes\WpWebFramework\Wordpress\Mvc;


if (!class_exists( 'Controller' ) ) {

    abstract class Controller 
    {
        #region Attributes

        #endregion

        #region Constructors

        #endregion

        #region Methods

        protected function renderView($view, $model = array())
        {
            // TODO: Implement guards
            // $viewPath = \Rodes\Includes\Application::get_plugin_path() . '/Views/' . preg_replace('/Controller$/', '', basename(static::class), 1) . '/' . $view . '.php';
            // $viewPath = \Rodes\Includes\Application::get_plugin_path() . '/Views/' . $view . '.php';
            $viewPath = $this->getViewPath($view);

            echo TemplateEngine::renderView($viewPath, $model);
            exit;
        }

        protected function getViewPath($view)
        {
            $viewPath = \Rodes\Includes\Application::get_plugin_path() . '/Views/' . preg_replace('/Controller$/', '', basename(static::class), 1) . '/' . $view . '.php';

            return $viewPath;
        }
        
        #endregion

        #region Properties

        #endregion
	}
}