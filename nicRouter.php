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

$filePath = BASE_PATH . 'pages/' . $page . '.php';
syslog(LOG_INFO, "Trying to include: " . $filePath);

if (file_exists($filePath)) {
    include_once BASE_PATH . 'pages/default/head.html';
    include_once BASE_PATH . 'pages/default/header.html';

    include_once $filePath;

    include_once BASE_PATH . 'pages/default/footer.html';
} else {
    include BASE_PATH.'pages/nic/404.php';
}