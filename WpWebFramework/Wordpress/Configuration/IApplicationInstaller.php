<?php

namespace Rodes\WpWebFramework\Wordpress\Configuration;

if (!\interface_exists('IApplicationInstaller')) {

    interface IApplicationInstaller
    {
        public function activateApp($network_wide);
        public function deactivateApp();
    }
}