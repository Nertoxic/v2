<?php
#
#  _   _ _____ ____ _____ _____  _____ ____
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |
# | |\  | |___|  _ < | || |_| /  \ | | |___
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#

$env = parse_ini_file('.env');

if ($env === false) {
    $core->debugMessage("nicEnv.php", "The .env file could not be loaded.", true);
} else {
    // APP Settings
    $APP_NAME = $env['APP_NAME'];
    $APP_URL = $env['APP_URL'];
    $APP_LOGO = $env['APP_LOGO'];

    // Dashboard Settings
    $DASH_USERNAME = $env['DASH_USERNAME'];
    $DASH_PASSWORD = $env['DASH_PASSWORD'];

    // DB Settings
    $DB_HOST = $env['DB_HOST'];
    $DB_NAME = $env['DB_NAME'];
    $DB_USERNAME = $env['DB_USERNAME'];
    $DB_PASSWORD = $env['DB_PASSWORD'];
}

