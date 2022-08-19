<?php

class DbConnectionFactory
{

    private $host;
    private $db;
    private $user;
    private $pass;
    public  static $dbinstance;

    private function __construct()
    {
        $this->host = "localhost";
        $this->db = "etnoserbiabooking";
        $this->user = "admin";
        $this->pass = "admin";
    }


    public static function get_instance()
    {
        if (DbConnectionFactory::$dbinstance == null) {
            DbConnectionFactory::$dbinstance = new DbConnectionFactory();
        }
        return DbConnectionFactory::$dbinstance;
    }

    public function get_connection()
    {
        $conn = new mysqli($this->host, $this->user, $this->pass, $this->db);

        return $conn;

        if ($conn->connect_errno) {
            throw new ErrorException("Nauspesna konekcija: greska> " . $conn->connect_error . ", err kod>" . $conn->connect_errno);
        }
    }
}
