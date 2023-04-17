<?php
require(dirname(__DIR__)."/core/dbconnection.php");

class Category{
    private $c_id;
    private $c_name;

    private $dbConnection;

    function __construct(){
        $dbConnection = new DBConnectionManager();
        $this->dbConnection = $dbConnection->getConnection();
    }

    function getAll(){
        $query = "select * from category";
        $statement = $this->dbConnection->prepare($query);
        $statement->execute();
        return $statement->fetchAll();
    }

    function getCategory($category_id){
        $query = "select * from category WHERE category_id=:category_id";
        $statement = $this->dbConnection->prepare($query);
        $statement->execute(['category_id'=>$category_id]);
        return $statement->fetchAll();
    }

    function updateData($updatedData){
        $SQL = "UPDATE category SET category_name=:category_name WHERE category_id=:category_id";
        $stmt = $this->dbConnection->prepare($SQL);
        $stmt->execute([
            'category_name' => $updatedData[0],
            'category_id' => $updatedData[1]
        ]);
    }
}
?>