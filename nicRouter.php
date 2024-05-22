<?php
#
#  _   _ _____ ____ _____ _____  _____ ____
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |
# | |\  | |___|  _ < | || |_| /  \ | | |___
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#

# --------------------------------------------------------------------
# Setup base values
# --------------------------------------------------------------------

$page = $_GET['page'];

# --------------------------------------------------------------------
# Start loading called pages
# --------------------------------------------------------------------

if (isset($_GET['page'])) {
    $page = isset($_GET['page']) ? $_GET['page'] : 'index';
    $filePath = BASE_PATH . 'pages/' . $page . '.php';
    syslog(LOG_INFO, "Trying to include: " . $filePath);

    if (file_exists($filePath)) {
        include_once BASE_PATH . 'pages/default/head_example.html';
        include_once BASE_PATH . 'pages/default/header_example.html';

        include_once $filePath;

        include_once BASE_PATH . 'pages/default/footer_example.html';
    } else {
        include BASE_PATH.'pages/nic/404.php';
    }
}
