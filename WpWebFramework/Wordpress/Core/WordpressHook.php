<?php

/**
 * Default Wordpress hooks router registry.
 *
 * @since      1.0.0
 * @package    Rodes\Includes
 *
 */

namespace Rodes\WpWebFramework\Wordpress\Core;

if (!\class_exists('WordpressHook')) {

    // TODO: Refactor value and hookType into WordpressHookName and WordpressHookType
    class WordpressHook
    {
        #region Attributes

        private $id = null;
        private $type = null;

        #endregion

        #region Constructors

        public function __construct(WordpressHookId $id, WordpressHookType $type)
        {
            $this->setId($id);
            $this->setType($type);
        }

        #endregion

        #region Methods

        #endregion

        #region Properties

        public function getId()
        {
            return $this->id;
        }

        private function setId(WordpressHookId $id)
        {
            // TODO: Implement guards
            $this->id = $id;
        }

        public function getType()
        {
            return $this->type;
        }

        private function setType(WordpressHookType $type)
        {
            // TODO: Implement guards
            $this->type = $type;
        }

        #endregion
    }
}