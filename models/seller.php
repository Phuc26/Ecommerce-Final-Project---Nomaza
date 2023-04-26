<?php
require(dirname(__DIR__)."/core/dbconnection.php");

class Seller{
    private $seller_id;
    private $seller_username;
    private $seller_passwordhash;
    private $seller_name;
    private $seller_phone;
    private $seller_balance;
    private $seller_feedback;

    private $dbConnection;

    function __construct(){
        $dbConnection = new \database\DBConnectionManager();
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

    function login(){

        $verified = false;

        $dbPassword = $this->getBuyerPasswordByUsername();

        if(password_verify($this->buyer_passwordhash, $dbPassword)){

            $verified = true;

        }

        return $verified;
        
    }

    function buyerLogout(){

        $this->membershipProvider->logout();

    }

    function getBuyerPasswordByUsername(){

        $query = "SELECT buyer_passwordhash FROM buyer WHERE buyer_username = :buyer_username";

        $statement = $this->dbConnection->prepare($query);
        
        $statement->execute(['buyer_username'=> $this->buyer_username]);

        return $statement->fetchColumn(0);

    }

    function getBuyerByUsername($buyer_username){

        $query = "SELECT * FROM buyer WHERE buyer_username = :buyer_username";

        $statement = $this->dbConnection->prepare($query);
        
        $statement->execute(['buyer_username'=> $buyer_username]);



        return $statement->fetchAll(\PDO::FETCH_CLASS, Buyer::class);

    }

    public function setSellerUsername($seller_username){

        $this->seller_username = $seller_username;

    }
   
    public function getSellerUsername(){

        return $this->seller_username;

    }

    public function setSellerPassword($seller_passwordhash){

        $this->seller_passwordhash = $seller_passwordhash;

    }

    public function getSellerPassword(){

        return $this->seller_passwordhash;

    }

    public function setSellerName($seller_name){

        $this->seller_name = $seller_name;

    }
   
    public function getSellerName(){

        return $this->seller_name;

    }

    public function setSellerPhone($seller_phone){
        $this->seller_phone = $seller_phone;

    }
   
    public function getSellerPhone(){

        return $this->seller_phone;

    }

    public function setSellerBalance($seller_balance){
        $this->seller_balance = $seller_balance;
    }

    public function getSellerBalance(){

        return $this->seller_balance;

    }

    public function setSellerFeedback($seller_feedback){
        $this->seller_feedback = $seller_feedback;
    }
}
?>