<?php
require(dirname(__DIR__)."/core/dbconnection.php");

class Buyer{
    private $s_id;
    private $s_username;
    private $s_passwordhash;
    private $s_name;
    private $s_phone;
    private $s_balance;
    private $s_feedback;

    private $dbConnection;

    function __construct(){
        $dbConnection = new DBConnectionManager();
        $this->dbConnection = $dbConnection->getConnection();
    }

    function getAll(){
        $query = "select * from seller";
        $statement = $this->dbConnection->prepare($query);
        $statement->execute();
        return $statement->fetchAll();
    }

    function getBuyer($seller_id){
        $query = "select * from seller WHERE seller_id=:seller_id";
        $statement = $this->dbConnection->prepare($query);
        $statement->execute(['seller_id'=>$seller_id]);
        return $statement->fetchAll();
    }

    function updateData($updatedData){
        $SQL = "UPDATE buyer SET seller_username=:seller_username, seller_passwordhash=:seller_passwordhash, seller_name=:seller_name, seller_phone=:seller_phone, seller_balance=:buyer_balance, seller_feedback=:seller_feedback WHERE seller_id=:seller_id";
        $stmt = $this->dbConnection->prepare($SQL);
        $stmt->execute([
            'seller_username' => $updatedData[0],
            'seller_passwordhash' => $updatedData[1],
            'seller_name' => $updatedData[2],
            'seller_phone' => $updatedData[3],
            'seller_balance' => $updatedData[4],
            'seller_feedback' => $updatedData[5]
        ]);
    }
}
?>