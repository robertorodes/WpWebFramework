<?php

/**
 * 
 * Defines a template engine to render views.
 *
 * @since      1.0.0
 * @package    Rodes\WpWebFramework\Wordpress\Mvc
 *
 */

namespace Rodes\WpWebFramework\Wordpress\Mvc;


if ( ! class_exists( 'TemplateEngine' ) ) {

    class TemplateEngine implements ITemplateEngine
    {
        #region Methods

        public static function renderView($viewPath, $model)
        {
            return self::renderTemplate($viewPath, $model);
        }

		/**
		 * Renders a template.
		 *
		 * @param  string $default_template_path The path to the template, relative to the plugin's `views` folder
		 * @param  array  $variables             An array of variables to pass into the template's scope, indexed with the variable name so that it can be extract()-ed
		 * @param  string $require               'once' to use require_once() | 'always' to use require()
		 * @return string
		 *
		 * @since    1.0.0
		 */
		protected static function renderTemplate( $template_path, $variables = array(), $require = 'once' ){
			
			// if ( ! $template_path = locate_template( basename( $default_template_path ) ) ) {
			// 	$template_path = \Rodes\Includes\Application::get_plugin_path() . '/views/' . $default_template_path;
            // }

			if ( is_file( $template_path ) ) {
				extract( $variables );
				ob_start();
				if ( 'always' == $require ) {
					require( $template_path );
				} else {
					require_once( $template_path );
				}
				$template_content = apply_filters( 'plugin_name_template_content', ob_get_clean(), $template_path, $variables );
			} else {
				$template_content = '';
			}

			return $template_content;
        }
        
        #endregion
	}
}