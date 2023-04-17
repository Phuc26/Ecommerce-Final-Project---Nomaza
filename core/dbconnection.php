<?php
class DBConnectionManager{
    private $username;
    private $password;
    private $server;
    private $dbname;

    private $dbConnection;

    function __construct(){
        $this->username = "root";
        $this->password = "";
        $this->server = "localhost";
        $this->dbname = "project";

        try{
            $this->dbConnection = new PDO("mysql:host=$this->server;dbname=$this->dbname", $this->username, $this->password);
        }catch(PDOException $e){
            print "Error!: " . $e->getMessage() . "<br/>";
        }
    }

    function getConnection(){
        return $this->dbConnection;
    }
}
?>