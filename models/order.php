<?php
require(dirname(__DIR__)."/core/dbconnection.php");

class Order{
    private $o_id;
    private $o_status;

    private $dbConnection;

    function __construct(){
        $dbConnection = new DBConnectionManager();
        $this->dbConnection = $dbConnection->getConnection();
    }

    function getAll(){
        $query = "select * from order";
        $statement = $this->dbConnection->prepare($query);
        $statement->execute();
        return $statement->fetchAll();
    }

    function getOrder($order_id){
        $query = "select * from order WHERE order_id=:order_id";
        $statement = $this->dbConnection->prepare($query);
        $statement->execute(['order_id'=>$order_id]);
        return $statement->fetchAll();
    }

    function updateData($updatedData){
        $SQL = "UPDATE order SET order_status=:order_status WHERE order_id=:order_id";
        $stmt = $this->dbConnection->prepare($SQL);
        $stmt->execute([
            'order_status' => $updatedData[0],
            'order_id' => $updatedData[1]
        ]);
    }
}
?>