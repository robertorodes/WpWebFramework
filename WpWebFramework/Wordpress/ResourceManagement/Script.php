<?php

/**
 * Represents a script.
 *
 * @since      1.0.0
 * @package    Rodes\Includes
 *
 */

namespace Rodes\WpWebFramework\Wordpress\ResourceManagement;

if (!\class_exists('Script')) {

    class Script implements IScript
    {
        #region Attributes

        private $id = null;
        private $sourcePath = null;
        private $dependencies = null;
        private $version = null;
        private $inFooter = null;

        #endregion

        #region Constructors

        public function __construct($id, $sourcePath = '', $dependencies = array(), 
            $version = false, $inFooter = false)
        {
            $this->setId($id);
            $this->setSourcePath($sourcePath);
            $this->setDependencies($dependencies);
            $this->setVersion($version);
            $this->setInFooter($inFooter);
        }

        #endregion

        #region Methods

        #endregion

        #region Properties

        public function getId()
        {
            return $this->id;
        }

        private function setId($id)
        {
            // TODO: Implement guards
            $this->id = $id;
        }

        public function getSourcePath()
        {
            return $this->sourcePath;
        }

        private function setSourcePath($sourcePath)
        {
            // TODO: Implement guards
            $this->sourcePath = $sourcePath;
        }

        public function getDependencies()
        {
            return $this->dependencies;
        }

        private function setDependencies($dependencies)
        {
            // TODO: Implement guards
            $this->dependencies = $dependencies;
        }

        public function getVersion()
        {
            return $this->version;
        }

        private function setVersion($version)
        {
            // TODO: Implement guards
            $this->version = $version;
        }

        public function getInFooter()
        {
            return $this->inFooter;
        }

        private function setInFooter($inFooter)
        {
            // TODO: Implement guards
            $this->inFooter = $inFooter;
        }

        #endregion
    }
}