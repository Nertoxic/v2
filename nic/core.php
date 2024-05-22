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

        $nicVersion = "1.0.0"; # Changing this might break the framework!

        self::validatePHPVersion();

        # If Dev mode is enabled >>>
        if($t == "dev") { error_reporting(E_ALL); }
        # If Dev mode is enabled <<<

        require_once BASE_PATH . 'nic/modules/nicDB/code.php';
        require_once BASE_PATH . 'nic/modules/nicAuth/code.php';

        require_once BASE_PATH . 'nicRouter.php';

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