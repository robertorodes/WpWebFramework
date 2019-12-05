<?php

/**
 * Represents a set of handlers to manage Wordpress hook routes.
 *
 * @since      1.0.0
 * @package    Rodes\Includes
 *
 */

namespace Rodes\WpWebFramework\Wordpress\Mvc\Routing;

use Rodes\Collections\GenericCollection;

if (!\class_exists('RouteHandlers')) {

    final class RouteHandlers 
        extends GenericCollection 
        implements IRouteHandlers
    {
        #region Attributes

        #endregion

        #region Constructors

        public function __construct(IRouteHandler ...$handlers)
        {
            parent::__construct(...$handlers);
        }

        #endregion

        #region Methods

        #endregion

        #region Properties

        #endregion
    }
}