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

        if($t == "dev") {
            error_reporting(E_ALL);
            self::consoleDebugger(true);
        }

        # MODULE LOADER >>>
        require_once BASE_PATH . 'nic/modules/nicDB/code.php';
        require_once BASE_PATH . 'nic/modules/nicAuth/code.php';
        require_once BASE_PATH . 'nic/modules/nicPageRestriction/code.php';
        # MODULE LOADER <<<

        # LOAD HANDLER >>>
        require_once BASE_PATH . 'nic/handler/errorHandler.php';
        # LOAD HANDLER <<<

        if($t == "dev") {
            require_once BASE_PATH . 'nic/dev/router.php';
        } else {
            require_once BASE_PATH . 'nicRouter.php';
        }

    }

    public function error($text){

        die($text);

    }

    public function validatePHPVersion() {

        if (version_compare(PHP_VERSION, 8.2, '<')) {
            self::error("The PHP Version you are using is no longer supported");
        }

    }

    var $consoleDebugger;
    public function consoleDebugger($enabled) {

        if($enabled) {
            $this->consoleDebugger = true;

            echo "<script>console.log('--------------------- [NERTOXIC 🦥]');</script>";
            echo "<script>console.log('');</script>";
            echo "<script>console.log('Nertoxic debugger is running 🦥');</script>";
            echo "<script>console.log('');</script>";
            echo "<script>console.log('--------------------- [NERTOXIC 🦥]');</script>";
        } else {
            $this->consoleDebugger = false;
        }

    }

    public function debugMessage($file, $message, $critical) {

        if($this->consoleDebugger) {

            echo "<script>console.log('--------------------- [NERTOXIC 🦥]');</script>";
            echo "<script>console.log('');</script>";
            echo "<script>console.log('❗️ ERROR CATCHED ❗');</script>";
            echo "<script>console.log('File: ".$file."');</script>";
            echo "<script>console.error('Message: ".$message."');</script>";
            echo "<script>console.log('');</script>";
            echo "<script>console.log('--------------------- [NERTOXIC 🦥]');</script>";

            if($critical) {
                include BASE_PATH.'pages/nic/500.php';
                die();
            }

        }

    }

}