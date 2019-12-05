<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 */

namespace Rodes\WpWebFramework\Wordpress\Globalization;

use Rodes\WpWebFramework\Globalization\IGlobalizationManager;
use Rodes\WpWebFramework\Wordpress\Core\Actions;

class WordpressGlobalizationManager implements IGlobalizationManager
{
	#region Attributes

	/**
	 * The domain specified for this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $textDomain    The domain identifier for this plugin.
	 */
	private $textDomain;

	/**
	 * The path, relative to the root folder of the application where locale files 
	 * should be looked for.
	 * 
	 * @since 1.0.0
	 * @var string The relative path where locales can be found.
	 */
	private $localesRelativePath;

	#endregion

	#region Constructors

	/**
	 * Create an instance defining the locale of this plugin for internationalization.
	 *
	 * Use this WordpressGlobalizationManager class in order to set the domain and register the required
	 * hook with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function __construct($textDomain, $localesRelativePath = '.')
	{
		$this->setTextDomain($textDomain);
		$this->setLocalesRelativePath($localesRelativePath);

		\add_action(Actions::PluginsLoaded, function () {
			$this->loadTextDomain();
		});
	}

	#endregion

	#region Methods

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	private function loadTextDomain()
	{
		load_plugin_textdomain(
			$this->getTextDomain(),
			false,
			$this->getLocalesRelativePath()
		);
	}

	#endregion

	#region Properties

	/**
	 * Gets the text domain.
	 * 
	 * @since    1.0.0
	 * @return string Text domain.
	 */
	public function getTextDomain()
	{
		return $this->textDomain;
	}

	/**
	 * Set the domain equal to that of the specified domain.
	 *
	 * @since    1.0.0
	 * @param    string    $textDomain    The domain that represents the locale of this plugin.
	 */
	private function setTextDomain($textDomain)
	{
		// TODO: Validate argument is not null and typing.
		$this->textDomain = $textDomain;
	}

	public function getLocalesRelativePath()
	{
		return $this->localesRelativePath;
	}

	/**
	 * Set the the path, relative to the root folder of the application where locale files 
	 * should be looked for.
	 *
	 * @since    1.0.0
	 * @param    string    $localesRelativePath    The relative path where locales can be found.
	 */
	private function setLocalesRelativePath($localesRelativePath)
	{
		// TODO: Validate argument is not null and typing.
		$this->localesRelativePath = $localesRelativePath;
	}

	#endregion
}
