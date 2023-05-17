<?php

namespace models;
require_once(dirname(__DIR__) . "/core/dbconnectionmanager.php");

class Cart
{
    private $cart_id;
    private $product_id;
    private $buyer_id;
    private $qty;
    private $price;

    private $dbConnection;

    function __construct()
    {
        $dbConnection = new \database\DBConnectionManager();
        $this->dbConnection = $dbConnection->getConnection();
    }

    public function setCartId($cart_id)
    {
        $this->cart_id = $cart_id;
    }
    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
    }

    public function setBuyerId($buyer_id)
    {
        $this->buyer_id = $buyer_id;
    }

    public function setQty($qty)
    {
        $this->qty = $qty;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function create()
    {
        $query = "INSERT INTO cart (product_id, buyer_id, qty, price)
        VALUES(:product_id, :buyer_id, :qty, :price)";

        $statement = $this->dbConnection->prepare($query);

        return $statement->execute([
            'product_id' => $this->product_id,
            'buyer_id' => $this->buyer_id,
            'qty' => $this->qty,
            'price' => $this->price
        ]);
    }

    public function getBuyerCartData($buyerId){
        $query = "select cart.*,product_image, product_name from cart inner join product on cart.product_id=product.product_id
        WHERE buyer_id=:buyer_id";
        $statement = $this->dbConnection->prepare($query);
        $statement->execute(['buyer_id' => $buyerId]);
        return $statement->fetchAll(\PDO::FETCH_OBJ);
    }

    public function removeFromCart(){
        $query = "DELETE FROM cart WHERE cart_id=:cart_id";
        $statement = $this->dbConnection->prepare($query);
        $statement->execute(['cart_id' => $this->cart_id]);
    }
}