<?php
require(dirname(__DIR__)."/core/dbconnection.php");

class Buyer{
    private $b_id;
    private $b_username;
    private $b_passwordhash;
    private $b_name;
    private $b_phone;
    private $b_street;
    private $b_postalcode;
    private $b_city;

    private $dbConnection;

    function __construct(){
        $dbConnection = new DBConnectionManager();
        $this->dbConnection = $dbConnection->getConnection();
    }

    function getAll(){
        $query = "select * from buyer";
        $statement = $this->dbConnection->prepare($query);
        $statement->execute();
        return $statement->fetchAll();
    }

    function getBuyer($buyer_id){
        $query = "select * from buyer WHERE buyer_id=:buyer_id";
        $statement = $this->dbConnection->prepare($query);
        $statement->execute(['buyer_id'=>$buyer_id]);
        return $statement->fetchAll();
    }

    function updateData($updatedData){
        $SQL = "UPDATE buyer SET buyer_username=:buyer_username, buyer_passwordhash=:buyer_passwordhash, buyer_name=:buyer_name, buyer_phone=:buyer_phone, buyer_street=:buyer_street, buyer_postalcode=:buyer_postalcode, buyer_city=:buyer_city WHERE order_id=:order_id";
        $stmt = $this->dbConnection->prepare($SQL);
        $stmt->execute([
            'buyer_username' => $updatedData[0],
            'buyer_passwordhash' => $updatedData[1],
            'buyer_name' => $updatedData[2],
            'buyer_phone' => $updatedData[3],
            'buyer_street' => $updatedData[4],
            'buyer_postalcode' => $updatedData[5],
            'buyer_city' => $updatedData[6],
            'buyer_id' => $updatedData[7]
        ]);
    }
}
?>