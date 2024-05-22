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
# Load the mysql Database
# --------------------------------------------------------------------

$mysql = new mysql();
class mysql
{
    private $db;

    public function __construct()
    {
        $this->db = $this->db();
    }

    public function db()
    {

        $dbHost = $GLOBALS['DB_HOST'];
        $dbName = $GLOBALS['DB_NAME'];
        $dbUser = $GLOBALS['DB_USERNAME'];
        $dbPass = $GLOBALS['DB_PASSWORD'];

        $db = new PDO('mysql:host=' . $dbHost . ';charset=utf8;dbname=' . $dbName, $dbUser, $dbPass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }

    public function createTable($tableName, $columns)
    {
        $sql = "CREATE TABLE IF NOT EXISTS $tableName (";
        $sql .= implode(", ", $columns);
        $sql .= ") ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

        $this->db->exec($sql);
    }

}