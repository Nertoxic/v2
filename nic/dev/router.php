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
# Start loading called pages
# --------------------------------------------------------------------

if(empty($_GET['page'])){
    $page = 'index';
} else {
    $page = $_GET['page'];
}

$ph->setName($page);

$filePath = BASE_PATH . 'pages/' . $page . '.php';
syslog(LOG_INFO, "Trying to include: " . $filePath);
self::debugMessage("nic/dev/router.php", "Trying to include: " . $filePath, false);

if (file_exists($filePath)) {
    include_once BASE_PATH . 'pages/default/head_example.php';
    include_once BASE_PATH . 'pages/default/header_example.php';

    include_once $filePath;

    include_once BASE_PATH . 'pages/default/footer_example.php';
} else {
    include BASE_PATH.'pages/nic/404.php';
}