<?php

namespace models;
require_once(dirname(__DIR__) . "/core/dbconnectionmanager.php");

class Wishlist
{
    private $wishlist_id;
    private $product_id;
    private $buyer_id;


    private $dbConnection;

    function __construct()
    {
        $dbConnection = new \database\DBConnectionManager();
        $this->dbConnection = $dbConnection->getConnection();
    }

    public function setWishlistId($wishlist_id)
    {
        $this->wishlist_id = $wishlist_id;
    }
    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
    }

    public function setBuyerId($buyer_id)
    {
        $this->buyer_id = $buyer_id;
    }


    public function create()
    {
        $query = "INSERT INTO wishlist (product_id, buyer_id) VALUES(:product_id, :buyer_id)";

        $statement = $this->dbConnection->prepare($query);

        return $statement->execute([
            'product_id' => $this->product_id,
            'buyer_id' => $this->buyer_id
        ]);
    }

    public function getBuyerData($buyerId){
        $query = "select wishlist.*,product_image, product_name, product_price from wishlist 
        inner join product on wishlist.product_id=product.product_id WHERE buyer_id=:buyer_id";
        $statement = $this->dbConnection->prepare($query);
        $statement->execute(['buyer_id' => $buyerId]);
        return $statement->fetchAll(\PDO::FETCH_OBJ);
    }

    public function removeFromWishlist(){
        $query = "DELETE FROM wishlist WHERE wishlist_id=:wishlist_id";
        $statement = $this->dbConnection->prepare($query);
        $statement->execute(['wishlist_id' => $this->wishlist_id]);
    }
}