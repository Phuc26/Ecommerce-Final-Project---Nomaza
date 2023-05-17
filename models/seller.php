<?php

namespace models;
require_once(dirname(__DIR__)."/core/dbconnectionmanager.php");

class Seller
{
    private $seller_id;
    private $seller_username;
    private $seller_passwordhash;
    private $seller_name;
    private $seller_phone;
    private $seller_balance;
    private $seller_feedback;

    private $dbConnection;

    private $membershipProvider;

    function __construct()
    {
        $dbConnection = new \database\DBConnectionManager();
        $this->dbConnection = $dbConnection->getConnection();
    }

    function create()
    {
        if($this->seller_username){
            $query = "INSERT INTO seller (seller_username, seller_passwordhash, seller_name, seller_phone)
            VALUES(:seller_username, :seller_passwordhash, :seller_name, :seller_phone)";

            $statement = $this->dbConnection->prepare($query);

            $seller_passwordhash = password_hash($this->seller_passwordhash, PASSWORD_DEFAULT);

            return $statement->execute(['seller_username' => $this->seller_username, 'seller_passwordhash' => $seller_passwordhash, 'seller_name' => $this->seller_name,
            'seller_phone' => $this->seller_phone]);
        }


    }

    function getAll()
    {
        $query = "select * from seller";
        $statement = $this->dbConnection->prepare($query);
        $statement->execute();
        return $statement->fetchAll();
    }

    function getSeller($seller_id)
    {
        $query = "select * from seller WHERE seller_id=:seller_id";
        $statement = $this->dbConnection->prepare($query);
        $statement->execute(['seller_id' => $seller_id]);
        return $statement->fetchAll();
    }

    function updateData($updatedData)
    {
        $SQL = "UPDATE seller SET seller_username=:seller_username, seller_passwordhash=:seller_passwordhash, seller_name=:seller_name, seller_phone=:seller_phone, seller_balance=:buyer_balance, seller_feedback=:seller_feedback WHERE seller_id=:seller_id";
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

    function login()
    {

        $verified = false;

        $query = "SELECT * FROM seller WHERE seller_username = :seller_username";

        $statement = $this->dbConnection->prepare($query);

        $statement->execute(['seller_username' => $this->seller_username]);
        $sellerData = $statement->fetch(\PDO::FETCH_OBJ);
        if($sellerData){
            if (password_verify($this->seller_passwordhash, $sellerData->seller_passwordhash)) {
                return $sellerData;
            }
        }


        return null;

    }

    function sellerLogout()
    {

        $this->membershipProvider->logout();

    }

    function getSellerPasswordByUsername()
    {

        $query = "SELECT seller_passwordhash FROM seller WHERE seller_username = :seller_username";

        $statement = $this->dbConnection->prepare($query);

        $statement->execute(['seller_username' => $this->seller_username]);

        return $statement->fetchColumn(0);

    }

    function getSellerByUsername($seller_username)
    {

        $query = "SELECT * FROM seller WHERE seller_username = :seller_username";

        $statement = $this->dbConnection->prepare($query);

        $statement->execute(['seller_username' => $seller_username]);


        return $statement->fetchAll(\PDO::FETCH_CLASS, Buyer::class);

    }

    public function setSellerUsername($seller_username)
    {

        $this->seller_username = $seller_username;

    }

    public function getSellerUsername()
    {

        return $this->seller_username;

    }

    public function setSellerPassword($seller_passwordhash)
    {

        $this->seller_passwordhash = $seller_passwordhash;

    }

    public function getSellerPassword()
    {

        return $this->seller_passwordhash;

    }

    public function setSellerName($seller_name)
    {

        $this->seller_name = $seller_name;

    }

    public function getSellerName()
    {

        return $this->seller_name;

    }

    public function setSellerPhone($seller_phone)
    {
        $this->seller_phone = $seller_phone;

    }

    public function getSellerPhone()
    {

        return $this->seller_phone;

    }

    public function setSellerBalance($seller_balance)
    {
        $this->seller_balance = $seller_balance;
    }

    public function getSellerBalance()
    {

        return $this->seller_balance;

    }

    public function setSellerFeedback($seller_feedback)
    {
        $this->seller_feedback = $seller_feedback;
    }
}

?>