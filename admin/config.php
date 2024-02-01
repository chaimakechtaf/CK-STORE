<?php

class Connection {
    private $username = "root";
    private $dbname   = "admin";
    private $hostname = "localhost";
    private $password = "";
    public $conn;

    function check($data) {
        $data = htmlspecialchars($data);
        $data = trim($data);
        $data = stripslashes($data);
        return $data;
    } 

    function connect() {
        $conn = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);

        if ($conn->connect_error) {
            die('Failed to connect to the database: ' . $conn->connect_error);
        }

        return $conn;
    }
}

$connection = new Connection();
$conn = $connection->connect();


//  simple script to connect database
/*
 $username = "root";
 $dbname   = "admin";
 $hostname = "localhost";
 $password = "";

 $conn = new mysqli($hostname, $username, $password, $dbname);

 if($conn->connect_error){
   echo 'failed connection';
 }else{
   echo "connect with succefull";
 }*/