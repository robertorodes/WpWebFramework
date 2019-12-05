<?php

/**
 * ApplicationInformation class that contains application metadata.
 *
 * @package Rodes\AppStart
 * @since   1.0.0
 *
 */

namespace Rodes\WpWebFramework\Configuration;

if (!\class_exists('ApplicationInformation')) {

    class ApplicationInformation implements IApplicationInformation 
    {
        private $applicationId = null;
        private $applicationName = null;
        private $applicationVersion = null;
        private $applicationPath = null;
        private $applicationUrl = null;
        private $applicationBaseFolder = null;
        private $applicationStartFileName = null;
        private $requiredPhpVersion = null;

        public function __construct($applicationId, $applicationName, $applicationVersion,
            $applicationPath, $applicationUrl, $applicationBaseFolder, 
            $applicationStartFileName, $requiredPhpVersion)
        {
            $this->setApplicationId($applicationId);
            $this->setApplicationName($applicationName);
            $this->setApplicationVersion($applicationVersion);
            $this->setApplicationPath($applicationPath);
            $this->setApplicationUrl($applicationUrl);
            $this->setApplicationBaseFolder($applicationBaseFolder);
            $this->setApplicationStartFileName($applicationStartFileName);
            $this->setRequiredPhpVersion($requiredPhpVersion);
        }

        public function getApplicationId() 
        {
            return $this->applicationId;
        }

        private function setApplicationId($applicationId)
        {
            // TODO: Assert argument type and not null.
            $this->applicationId = $applicationId;
        }

        public function getApplicationName()
        {
            return $this->applicationName;
        }

        private function setApplicationName($applicationName)
        {
            // TODO: Assert argument type and not null.
            $this->applicationName = $applicationName;
        }

        public function getApplicationVersion() 
        {
            return $this->applicationVersion;
        }

        private function setApplicationVersion($applicationVersion)
        {
            // TODO: Assert argument type and not null.
            $this->applicationVersion = $applicationVersion;
        }

        public function getApplicationPath()
        {
            return $this->applicationPath;
        }

        private function setApplicationPath($applicationPath)
        {
            // TODO: Implement guards
            $this->applicationPath = $applicationPath;
        }

        public function getApplicationUrl()
        {
            return $this->applicationUrl;
        }

        private function setApplicationUrl($applicationUrl)
        {
            // TODO: Implement guards
            $this->applicationUrl = $applicationUrl;
        }

        public function getApplicationBaseFolder()
        {
            return $this->applicationBaseFolder;
        }

        private function setApplicationBaseFolder($applicationBaseFolder)
        {
            // TODO: Implement guards
            $this->applicationBaseFolder = $applicationBaseFolder;
        }

        public function getApplicationStartFileName()
        {
            return $this->applicationStartFileName;
        }

        private function setApplicationStartFileName($applicationStartFileName) {
            // TODO: Implement guards
            $this->applicationStartFileName = $applicationStartFileName;
        }

        public function getApplicationStartFilePath()
        {
            return $this->getApplicationPath() . $this->getApplicationStartFileName();
        }

        public function getRequiredPhpVersion()
        {
            return $this->requiredPhpVersion;   
        }

        private function setRequiredPhpVersion($requiredPhpVersion)
        {
            // TODO: Assert argument type and not null.
            $this->requiredPhpVersion = $requiredPhpVersion;
        }
    }
}