<?php
require(dirname(__DIR__)."/core/dbconnection.php");

class Review{
    private $r_id;
    private $r_comment;
    private $r_rating;

    private $dbConnection;

    function __construct(){
        $dbConnection = new DBConnectionManager();
        $this->dbConnection = $dbConnection->getConnection();
    }

    function getAll(){
        $query = "select * from review";
        $statement = $this->dbConnection->prepare($query);
        $statement->execute();
        return $statement->fetchAll();
    }

    function getReview($review_id){
        $query = "select * from review WHERE review_id=:review_id";
        $statement = $this->dbConnection->prepare($query);
        $statement->execute(['review_id'=>$review_id]);
        return $statement->fetchAll();
    }

    function updateData($updatedData){
        $SQL = "UPDATE review SET review_comment=:review_comment, review_rating=:review_rating WHERE review_id=:review_id";
        $stmt = $this->dbConnection->prepare($SQL);
        $stmt->execute([
            'review_comment' => $updatedData[0],
            'review_rating' => $updatedData[1],
            'review_id' => $updatedData[2]
        ]);
    }
}
?>