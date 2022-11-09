<?php

class Database{
    private $severname = "localhost";
    private $username = "root";
    private $password = "";
    private $db_name = "the-company";
    protected $conn;

    public function __construct(){
        $this->conn = new mysqli($this->severname, $this->username, $this->password, $this->db_name);

        if($this->conn->connect_error){
            die("Unable to Connect to the database:".$this->conn->connect_error);
        }
    }
}
