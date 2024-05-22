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

    // Load the html files
    include_once BASE_PATH . 'pages/default/head_example.html';
    include_once BASE_PATH . 'pages/default/header_example.html';

    include_once BASE_PATH . "pages/" . $_GET['page'] . ".php";

    include_once BASE_PATH . 'pages/default/footer_example.html';

} else {
    $core->error("The router file couldnt be loaded check the .htaccess for errors.");
}
