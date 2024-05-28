<?php
#
#  _   _ _____ ____ _____ _____  _____ ____
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |
# | |\  | |___|  _ < | || |_| /  \ | | |___
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#

ob_start();

# >>>
global $core;
# <<<

define('BASE_PATH', __DIR__.'/');
define('CORE_PATH', __DIR__.'/nic/code/');
define('MODULE_PATH', __DIR__.'/nic/modules/');

require_once BASE_PATH . 'nicEnv.php';
require_once BASE_PATH . 'nic/core.php';

$core->start("dev"); # Disable dev mode if u finished development (change to "prod")