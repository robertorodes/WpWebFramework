<?php

/**
 * Wordpress action names.
 *
 * @since      1.0.0
 * @package    Rodes\Wordpress
 *
 */

namespace Rodes\WpWebFramework\Wordpress\Core;

if (!\class_exists('Actions')) {

    class Actions
    {
        const PluginsLoaded = 'plugins_loaded';
        const EnqueueScripts = 'wp_enqueue_scripts';
        const TemplateRedirect = 'template_redirect';
    }
}