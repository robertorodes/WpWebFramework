<?php

/**
 * Manages the registration of scripts.
 *
 * @since      1.0.0
 * @package    Rodes\Includes
 *
 */

namespace Rodes\WpWebFramework\Wordpress\ResourceManagement;

use Rodes\WpWebFramework\Wordpress\Core\Actions;

if (!\class_exists('ScriptsRegistrar')) {

    final class ScriptsRegistrar
        implements IScriptsRegistrar
    {
        #region Attributes

        private $scripts = null;

        #endregion

        #region Constructors

        public function __construct(IScriptCollection $scripts)
        {
            if (is_null($scripts)) {
                $scripts = new ScriptCollection();
            }

            $this->setScripts($scripts);
        }

        #endregion

        #region Methods

        public function registerScripts()
        {
            $this->registerHooks();
        }

        public function addScript(IScript $script)
        {
            // TODO: Implement guards
            $this->getScripts()->add($script);
        }

        public function addScripts(IScript ...$scripts)
        {
            foreach ($scripts as $script) {
                $this->addScript($script);
            }
        }

        private function registerHooks()
        {
            \add_action(Actions::EnqueueScripts, function () {
                $this->enqueueScripts();
            });
        }

        private function enqueueScripts()
        {
            foreach ($this->getScripts() as $script) {
                wp_enqueue_script(
                    $script->getId(),
                    $script->getSourcePath(),
                    $script->getDependencies(),
                    $script->getVersion(),
                    $script->getInFooter()
                );
            }
        }

        #endregion

        #region Properties

        public function getScripts()
        {
            return $this->scripts;
        }

        private function setScripts(IScriptCollection $scripts)
        {
            // TODO: Implement guards
            $this->scripts = $scripts;
        }

        #endregion
    }
}