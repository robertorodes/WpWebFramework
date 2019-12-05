<?php

/**
 * Wordpress hook types.
 *
 * @since      1.0.0
 * @package    Rodes\Wordpress
 *
 */

namespace Rodes\WpWebFramework\Wordpress\Core;

if (!\class_exists('HookTypes')) {

    class HookTypes
    {
        const Filter = 0;
        const Action = 1;
    }
}