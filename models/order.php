<?php

namespace models;
require(dirname(__DIR__) . "/core/dbconnectionmanager.php");

class Order
{
    private $order_id;
    private $order_status;
    private $product_id;
    private $price;
    private $buyer_id;

    private $dbConnection;

    function __construct()
    {
        $dbConnection = new \database\DBConnectionManager();
        $this->dbConnection = $dbConnection->getConnection();
    }

    function setOrderId($order_id)
    {
        $this->order_id = $order_id;
    }

    function setOrderStatus($order_status)
    {
        $this->order_status = $order_status;
    }

    function setProductId($productId)
    {
        $this->product_id = $productId;
    }

    function setPrice($price)
    {
        $this->price = $price;
    }

    function setBuyerId($buyer_id)
    {
        $this->buyer_id = $buyer_id;
    }

    function orderCreate()
    {
        $query = "INSERT INTO orders (product_id, buyer_id, price, order_status)
        VALUES(:product_id, :buyer_id, :price, :order_status)";

        $statement = $this->dbConnection->prepare($query);

        return $statement->execute([
            'product_id' => $this->product_id,
            'buyer_id' => $this->buyer_id,
            'price' => $this->price,
            'order_status' => $this->order_status
        ]);
    }

    public function getBuyerOrders($buyerId)
    {
        $query = "select orders.*, product_name from orders inner join product
        on orders.product_id=product.product_id WHERE buyer_id=:buyer_id";
        $statement = $this->dbConnection->prepare($query);
        $statement->execute(['buyer_id' => $buyerId]);
        return $statement->fetchAll(\PDO::FETCH_OBJ);
    }

    public function orderStatusUpdate(){
        $SQL = "UPDATE orders SET order_status=:order_status WHERE order_id=:order_id";
        $stmt = $this->dbConnection->prepare($SQL);
        $stmt->execute([
            'order_status' => $this->order_status,
            'order_id' => $this->order_id
        ]);
    }

    public function getSellerOrders($sellerId)
    {
        $query = "select orders.*, product_name from orders inner join product
        on orders.product_id=product.product_id WHERE seller_id=:seller_id";
        $statement = $this->dbConnection->prepare($query);
        $statement->execute(['seller_id' => $sellerId]);
        return $statement->fetchAll(\PDO::FETCH_OBJ);
    }
}

?>