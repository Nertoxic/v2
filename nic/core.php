<?php
#
#  _   _ _____ ____ _____ _____  _____ ____
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |
# | |\  | |___|  _ < | || |_| /  \ | | |___
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#

$core = new core();
class core
{

    public function start($t) {

        require_once BASE_PATH.'nicVersion.php'; # Include Versioning file

        self::validatePHPVersion(); # Check for PHP Support

        # If Dev mode is enabled >>>
        if($t == "dev") { error_reporting(E_ALL); }
        # If Dev mode is enabled <<<

        # MODULE LOADER >>>
        require_once BASE_PATH . 'nic/modules/nicDB/code.php'; # Include NIC Core Functions
        require_once BASE_PATH . 'nic/modules/nicAuth/code.php'; # Include NIC Auth Module
        # MODULE LOADER <<<

        require_once BASE_PATH . 'nicRouter.php'; # Include Routing

    }

    public function error($text){

        die($text);

    }

    public function validatePHPVersion() {

        if (version_compare(PHP_VERSION, 8.2, '<')) {
            self::error("The PHP Version you are using is no longer supported");
        }

    }

}