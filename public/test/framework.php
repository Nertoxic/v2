<?php
#
#  _   _ _____ ____ _____ _____  _____ ____
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |
# | |\  | |___|  _ < | || |_| /  \ | | |___
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#

define('BASE_PATH', __DIR__.'../../');

// require_once BASE_PATH . 'nicEnv.php'; # Cant test env on github
require_once BASE_PATH . 'nicRouter.php';
require_once BASE_PATH . 'nicVersion.php';

require_once BASE_PATH . 'nic/core.php';
require_once BASE_PATH . 'nic/modules/nicAuth/code.php';
// require_once BASE_PATH . 'nic/modules/nicAuth/code.php'; # Cant test db on github
require_once BASE_PATH . 'nic/modules/nicPageRestriction.php';