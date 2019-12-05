<?php

/**
 * Represents a Wordpress hook type.
 *
 * @since      1.0.0
 * @package    Rodes\Includes
 *
 */

namespace Rodes\WpWebFramework\Wordpress\Core;

if (!\class_exists('WordpressHookType')) {

    // TODO: Refactor value and hookType into WordpressHookName and WordpressHookType
    class WordpressHookType
    {
        #region Attributes

        private $value = null;

        #endregion

        #region Constructors

        public function __construct($value)
        {
            $this->setValue($value);
        }

        #endregion

        #region Methods

        #endregion

        #region Properties

        public function getValue()
        {
            return $this->value;
        }

        private function setValue($value)
        {
            // TODO: Implement guards
            $this->value = $value;
        }

        #endregion
    }
}