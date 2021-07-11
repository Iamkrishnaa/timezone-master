<?php

class DatabaseConfig
{
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "timezone";

    private $port = "3306";

    public function getHostName(): string
    {
        return $this->hostname;
    }
    public function getUserName(): string
    {
        return $this->username;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
    public function getDb(): string
    {
        return $this->db;
    }
    public function getPort(): string
    {
        return $this->port;
    }
}
