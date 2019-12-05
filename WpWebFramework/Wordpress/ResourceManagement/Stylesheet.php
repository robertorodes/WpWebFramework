<?php

/**
 * Represents a css stylesheet.
 *
 * @since      1.0.0
 * @package    Rodes\Includes
 *
 */

namespace Rodes\WpWebFramework\Wordpress\ResourceManagement;


if (!\class_exists('Stylesheet')) {

    class Stylesheet implements IStylesheet
    {
        #region Attributes

        private $id = null;
        private $sourcePath = null;
        private $dependencies = null;
        private $version = null;
        private $media = null;

        #endregion

        #region Constructors

        public function __construct($id, $sourcePath = '', $dependencies = array(), 
            $version = false, $media = 'all')
        {
            $this->setId($id);
            $this->setSourcePath($sourcePath);
            $this->setDependencies($dependencies);
            $this->setVersion($version);
            $this->setMedia($media);
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

        public function getMedia()
        {
            return $this->media;
        }

        private function setMedia($media)
        {
            // TODO: Implement guards
            $this->media = $media;
        }

        #endregion
    }
}