<?php

/**
 * ApplicationInformation class that contains application metadata.
 *
 * @package Rodes\AppStart
 * @since   1.0.0
 *
 */

namespace Rodes\WpWebFramework\Wordpress\Configuration;

use Rodes\WpWebFramework\Configuration\ApplicationInformation;


if (!\class_exists('WordpressApplicationInformation')) {

    class WordpressApplicationInformation 
        extends ApplicationInformation 
        implements IWordpressApplicationInformation
    {
        private $requiredWpVersion = null;
        private $isWordpressNetworkRequired = false;

        public function __construct($applicationId, $applicationName, $applicationVersion,
            $applicationPath, $applicationUrl, $applicationBaseFolder, $applicationStartFileName,
            $requiredPhpVersion, $requiredWordpressVersion, $isWordpressNetworkRequired)
        {
            parent::__construct($applicationId, 
                $applicationName, 
                $applicationVersion,
                $applicationPath,
                $applicationUrl,
                $applicationBaseFolder,
                $applicationStartFileName,
                $requiredPhpVersion);
            $this->setRequiredWordpressVersion($requiredWordpressVersion);
            $this->setIsWordpressNetworkRequired($isWordpressNetworkRequired);
        }

        public function getRequiredWordpressVersion()
        {
            return $this->requiredWpVersion;
        }

        private function setRequiredWordpressVersion($requiredWpVersion)
        {
            // TODO: Assert argument type and not null.
            $this->requiredWpVersion = $requiredWpVersion;
        }

        public function isWordpressNetworkRequired()
        {
            return $this->isWpNetworkRequired;
        }

        public function setIsWordpressNetworkRequired($isWordpressNetworkRequired)
        {
            // TODO: Assert argument type and not null.
            $this->isWpNetworkRequired = $isWordpressNetworkRequired;
        }
    }
}