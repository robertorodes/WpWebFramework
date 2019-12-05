<?php

/**
 * Represents a collection of stylesheets.
 *
 * @since      1.0.0
 * @package    Rodes\Includes
 *
 */

namespace Rodes\WpWebFramework\Wordpress\ResourceManagement;

use Rodes\Collections\GenericCollection;

if (!\class_exists('Stylesheets')) {

    final class Stylesheets 
        extends GenericCollection 
        implements IStylesheets
    {
        #region Attributes

        #endregion

        #region Constructors

        public function __construct(IStylesheet ...$stylesheets)
        {
            parent::__construct(...$stylesheets);
        }

        #endregion

        #region Methods

        public function add(IStylesheet $stylesheet)
        {
            // TODO: Implement guards
            $styles = &$this->getValues();
            $styles[] = $stylesheet;
        }

        #endregion

        #region Properties

        #endregion
    }
}