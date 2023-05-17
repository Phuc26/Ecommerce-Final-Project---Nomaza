<?php

namespace models;

require_once(dirname(__DIR__) . "/core/dbconnectionmanager.php");

class Product
{
    private $product_id;
    private $product_name;
    private $product_price;
    private $product_quantity;
    private $product_image;
    private $product_description;
    private $category_id;
    private $seller_id;

    private $dbConnection;

    function __construct()
    {
        $dbConnection = new \database\DBConnectionManager();
        $this->dbConnection = $dbConnection->getConnection();
    }

    public function setProductName($product_name)
    {
        $this->product_name = $product_name;
    }

    public function setProductPrice($product_price)
    {
        $this->product_price = $product_price;
    }

    public function setProductQuantity($product_quantity)
    {
        $this->product_quantity = $product_quantity;
    }

    public function setProductImage($product_image)
    {
        $this->product_image = $product_image;
    }

    public function setProductDescription($product_description)
    {
        $this->product_description = $product_description;
    }

    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }

    public function setSellerId($seller_id)
    {
        $this->seller_id = $seller_id;
    }

    function getAll()
    {
        $query = "SELECT * FROM product inner join seller on product.seller_id=seller.seller_id where product_quantity != 0";
        $statement = $this->dbConnection->prepare($query);
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_OBJ);
    }


    function getAllByFilter($searchQuery)
    {
        $query = "SELECT product.*, seller_name FROM product 
        LEFT JOIN (SELECT review_id, product_id, SUM(review_rating) rating 
        FROM review GROUP BY product_id) AS r ON r.product_id = product.product_id 
        inner join seller on product.seller_id=seller.seller_id
        where product_quantity != 0 ";

        if(!empty($searchQuery['category'])){
            $query .= " and category_id=$searchQuery[category]";
        }
        if(!empty($searchQuery['product'])){
            $query .= " and product_name like '%$searchQuery[product]%'";
        }
        if(!empty($searchQuery['seller'])){
            $query .= " and seller_name like '%$searchQuery[seller]%'";
        }
        if(!empty($searchQuery['price'])){
            $query .= " order by product_price $searchQuery[price]";
        }
        if(!empty($searchQuery['rating'])){
            $query .=" group by product.product_id ORDER BY rating $searchQuery[rating]";
        }

        $statement = $this->dbConnection->prepare($query);
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_OBJ);
    }

    function create()
    {
        $query = "INSERT INTO product (product_name, product_price, product_quantity, product_image, product_description, category_id, seller_id)
        VALUES (:product_name, :product_price, :product_quantity, :product_image, :product_description, :category_id, :seller_id)";

        $statement = $this->dbConnection->prepare($query);
        $statement->execute([
            'product_name' => $this->product_name,
            'product_price' => $this->product_price,
            'product_quantity' => $this->product_quantity,
            'product_image' => $this->product_image,
            'product_description' => $this->product_description,
            'category_id' => $this->category_id,
            'seller_id' => $this->seller_id
        ]);

    }

    function getProduct($product_id)
    {
        $query = "select * from product WHERE product_id=:product_id";
        $statement = $this->dbConnection->prepare($query);
        $statement->execute(['product_id' => $product_id]);
        return $statement->fetchAll();
    }

    function updateData($updatedData)
    {
        $SQL = "UPDATE product SET product_name=:product_name, product_price=:product_price, product_quantity=:product_quantity,
        product_image=:product_image, product_description=:product_description, category_id=:category_id WHERE product_id=:product_id";
        $stmt = $this->dbConnection->prepare($SQL);
        $stmt->execute([
            'product_name' => $updatedData['product_name'],
            'product_price' => $updatedData['product_price'],
            'product_quantity' => $updatedData['product_quantity'],
            'product_image' => $updatedData['product_image'],
            'product_description' => $updatedData['product_description'],
            'category_id' => $updatedData['category_id'],
            'product_id' => $updatedData['product_id']
        ]);
    }

    function getSellerProducts($sellerId)
    {
        $query = "select product.*,category_name from product inner join category on product.category_id = category.category_id 
         WHERE seller_id=:seller_id";
        $statement = $this->dbConnection->prepare($query);
        $statement->execute(['seller_id' => $sellerId]);
        return $statement->fetchAll();
    }

    function getProductById($productId)
    {
        $query = "select * from product WHERE product_id=:product_id";
        $statement = $this->dbConnection->prepare($query);
        $statement->execute(['product_id' => $productId]);
        return $statement->fetch(\PDO::FETCH_OBJ);
    }

    function deleteProductById($productId)
    {
        $query = "DELETE FROM product WHERE product_id=:product_id";
        $statement = $this->dbConnection->prepare($query);
        $statement->execute(['product_id' => $productId]);
    }


}

?>