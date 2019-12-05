<?php

namespace Rodes\WpWebFramework\Configuration;

if (!\interface_exists('IApplicationConfiguration')) {

    interface IApplicationConfiguration
    {
        public function getApplicationInformation();
        public function getLocalesBaseFolder();      
    }
}
    