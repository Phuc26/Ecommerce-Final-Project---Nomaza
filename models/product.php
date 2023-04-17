<?php
require(dirname(__DIR__)."/core/dbconnection.php");

class Product{
    private $p_id;
    private $p_name;
    private $p_price;
    private $p_quantity;
    private $p_image;
    private $p_description;
    private $p_category;

    private $dbConnection;

    function __construct(){
        $dbConnection = new DBConnectionManager();
        $this->dbConnection = $dbConnection->getConnection();
    }

    function getAll(){
        $query = "select * from product";
        $statement = $this->dbConnection->prepare($query);
        $statement->execute();
        return $statement->fetchAll();
    }

    function getProduct($product_id){
        $query = "select * from product WHERE product_id=:product_id";
        $statement = $this->dbConnection->prepare($query);
        $statement->execute(['product_id'=>$product_id]);
        return $statement->fetchAll();
    }

    function updateData($updatedData){
        $SQL = "UPDATE product SET buyer_passwordhash=:buyer_passwordhash, buyer_name=:buyer_name, buyer_phone=:buyer_phone, buyer_street=:buyer_street, buyer_postalcode=:buyer_postalcode, buyer_city=:buyer_city WHERE order_id=:order_id";
        $stmt = $this->dbConnection->prepare($SQL);
        $stmt->execute([
            'product_name' => $updatedData[0],
            'product_price' => $updatedData[1],
            'product_quantity' => $updatedData[2],
            'product_image' => $updatedData[3],
            'product_description' => $updatedData[4],
            'product_category' => $updatedData[5],
            'product_id' => $updatedData[6],
        ]);
    }
}
?>