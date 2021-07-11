<?php
require "DatabaseConfig.php";
class CheckConnection
{
    private $connection;
    public function __construct()
    {
        $db = new DatabaseConfig();

        $this->connection = new mysqli(
            $db->getHostName(),
            $db->getUserName(),
            $db->getPassword(),
            $db->getDb(),
            $db->getPort()
        );
    }

    public function isConnected(): bool
    {
        if ($this->connection) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    //this is used to get connection link either true/false
    public function getConnection()
    {
        return $this->connection;
    }
}
