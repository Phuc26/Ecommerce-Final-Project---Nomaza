<?php
require(dirname(__DIR__)."/core/dbconnection.php");

class Shipping{
    private $sh_id;
    private $sh_status;
    private $sh_tracking;

    private $dbConnection;

    function __construct(){
        $dbConnection = new DBConnectionManager();
        $this->dbConnection = $dbConnection->getConnection();
    }

    function getAll(){
        $query = "select * from shipping";
        $statement = $this->dbConnection->prepare($query);
        $statement->execute();
        return $statement->fetchAll();
    }

    function getShipping($shipping_id){
        $query = "select * from shipping WHERE shipping_id=:shipping_id";
        $statement = $this->dbConnection->prepare($query);
        $statement->execute(['shipping_id'=>$shipping_id]);
        return $statement->fetchAll();
    }

    function updateData($updatedData){
        $SQL = "UPDATE shipping SET shipping_status=:shipping_status, shipping_tracking=:shipping_tracking WHERE shipping_id=:shipping_id";
        $stmt = $this->dbConnection->prepare($SQL);
        $stmt->execute([
            'shipping_status' => $updatedData[0],
            'shipping_tracking' => $updatedData[1],
            'shipping_id' => $updatedData[2]
        ]);
    }
}
?>