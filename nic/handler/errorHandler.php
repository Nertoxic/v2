<?php
#
#  _   _ _____ ____ _____ _____  _____ ____
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |
# | |\  | |___|  _ < | || |_| /  \ | | |___
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#

$error = new errorHandler;
class errorHandler
{

    public function get(){

        if(!empty($GLOBALS['errorMessage'])) {
            return $GLOBALS['errorMessage'];
        }

    }

}