<?php

/**
 * Represents a collection of scripts.
 *
 * @since      1.0.0
 * @package    Rodes\Includes
 *
 */

namespace Rodes\WpWebFramework\Wordpress\ResourceManagement;

use Rodes\Collections\GenericCollection;

if (!\class_exists('ScriptCollection')) {

    final class ScriptCollection
        extends GenericCollection 
        implements IScriptCollection
    {
        #region Attributes

        #endregion

        #region Constructors

        public function __construct(IScript ...$scripts)
        {
            parent::__construct(...$scripts);
        }

        #endregion

        #region Methods

        public function add(IScript $script)
        {
            // TODO: Implement guards
            $scripts = &$this->getValues();
            $scripts[] = $script;
        }

        #endregion

        #region Properties

        #endregion
    }
}