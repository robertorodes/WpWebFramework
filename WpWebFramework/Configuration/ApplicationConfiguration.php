<?php

namespace Rodes\WpWebFramework\Configuration;

use Rodes\WpWebFramework\Wordpress\Configuration\IWordpressApplicationInformation;


if (!\class_exists('ApplicationConfiguration')) {

    class ApplicationConfiguration implements IApplicationConfiguration
    {
        #region Attributes

        private $applicationInformation = null;

        #endregion

        #region Constructors

        public function __construct(IWordpressApplicationInformation $appInformation)
        {
            $this->setApplicationInformation($appInformation);
        }

        #endregion

        #region Properties

        public function getApplicationInformation()
        {
            return $this->applicationInformation;
        }

        private function setApplicationInformation(IWordpressApplicationInformation $appInformation)
        {
            // TODO: Implement guards
            $this->applicationInformation = $appInformation;
        }

        public function getLocalesBaseFolder()
        {
            return $this->getApplicationInformation()->getApplicationBaseFolder() . '/languages/';
        }

        #endregion
    }
}