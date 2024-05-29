<?php
#
#  _   _ _____ ____ _____ _____  _____ ____
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |
# | |\  | |___|  _ < | || |_| /  \ | | |___
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#

if(self::getRequestedSite() == "example/login") {
    $ph->setName("Login");
}

if(self::getRequestedSite() == "example/register") {
    $ph->setName("Register");
}