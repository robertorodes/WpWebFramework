<?php

/**
 * Manages the registration of css stylesheets.
 *
 * @since      1.0.0
 * @package    Rodes\Includes
 *
 */

namespace Rodes\WpWebFramework\Wordpress\ResourceManagement;

use Rodes\WpWebFramework\Wordpress\Core\Actions;

if (!\class_exists('StylesheetsRegistrar')) {

    final class StylesheetsRegistrar
        implements IStylesheetsRegistrar
    {
        #region Attributes

        private $stylesheets = null;

        #endregion

        #region Constructors

        public function __construct(IStylesheets $stylesheets)
        {
            if (is_null($stylesheets)) {
                $stylesheets = new Stylesheets();
            }

            $this->setStylesheets($stylesheets);
        }

        #endregion

        #region Methods

        public function registerStylesheets()
        {
            $this->registerHooks();
        }

        public function addStylesheet(IStylesheet $stylesheet)
        {
            // TODO: Implement guards
            $this->getStylesheets()->add($stylesheet);
        }

        public function addStylesheets(IStylesheet ...$stylesheets)
        {
            foreach ($stylesheets as $stylesheet) {
                $this->addStylesheet($stylesheet);
            }
        }

        private function registerHooks()
        {
            \add_action(Actions::EnqueueScripts, function () {
                $this->enqueueStylesheets();
            });
        }

        private function enqueueStylesheets()
        {
            foreach ($this->getStylesheets() as $stylesheet) {
                wp_enqueue_style(
                    $stylesheet->getId(),
                    $stylesheet->getSourcePath(),
                    $stylesheet->getDependencies(),
                    $stylesheet->getVersion(),
                    $stylesheet->getMedia()
                );
            }
        }

        #endregion

        #region Properties

        public function getStylesheets()
        {
            return $this->stylesheets;
        }

        private function setStylesheets(IStylesheets $stylesheets)
        {
            // TODO: Implement guards
            $this->stylesheets = $stylesheets;
        }

        #endregion
    }
}