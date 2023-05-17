<?php
namespace models;
require_once(dirname(__DIR__)."/core/dbconnectionmanager.php");

class Review{
    private $review_id;
    private $review_comment;
    private $review_rating;
    private $product_id;
    private $buyer_id;

    private $dbConnection;

    function __construct(){
        $dbConnection = new \database\DBConnectionManager();
        $this->dbConnection = $dbConnection->getConnection();
    }

    public function setReviewComment($review_comment){
        $this->review_comment = $review_comment;
    }

    public function setReviewRating($review_rating){
        $this->review_rating = $review_rating;
    }

    public function setProductId($product_id){
        $this->product_id = $product_id;
    }

    public function setBuyerId($buyer_id){
        $this->buyer_id = $buyer_id;
    }

    function create()
    {
        $query = "INSERT INTO review (review_comment, review_rating, product_id, buyer_id)
        VALUES(:review_comment, :review_rating, :product_id, :buyer_id)";

        $statement = $this->dbConnection->prepare($query);

        return $statement->execute([
            'review_comment' => $this->review_comment,
            'review_rating' => $this->review_rating,
            'product_id' => $this->product_id,
            'buyer_id' => $this->buyer_id
        ]);
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