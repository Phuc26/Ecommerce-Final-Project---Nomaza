<?php

namespace models;
require(dirname(__DIR__)."/core/dbconnectionmanager.php");
require(dirname(__DIR__)."/core/buyermembershipprovider.php");

class Buyer{
    private $buyer_id;
    private $buyer_username;
    private $buyer_passwordhash;
    private $buyer_name;
    private $buyer_phone;
    private $buyer_street;
    private $buyer_postalcode;
    private $buyer_city;

    private $enabled2fa = false;
    private $otpsecretkey;
    private $otpcodeisvalid;

    private $dbConnection;

    private $membershipProvider;

    function __construct(){
        $conManager = new \database\DBConnectionManager();
        $this->dbConnection = $conManager->getConnection();
        $this->membershipProvider = new \membershipprovider\BuyerMembershipProvider($this);
    }

    function create(){
        $query = "INSERT INTO buyer (buyer_username, buyer_passwordhash, buyer_name, buyer_phone, buyer_street, buyer_postalcode, buyer_city )
        VALUES(:buyer_username, :buyer_passwordhash, :buyer_name, :buyer_phone, :buyer_street, :buyer_postalcode, :buyer_city)";

        $statement = $this->dbConnection->prepare($query);


        $buyer_passwordhash = password_hash($this->buyer_passwordhash, PASSWORD_DEFAULT);

        return $statement->execute(['buyer_username' => $this->buyer_username, 'buyer_passwordhash'=> $buyer_passwordhash, 'buyer_name' => $this->buyer_name,
        'buyer_phone' => $this->buyer_phone, 'buyer_street' => $this->buyer_street, 'buyer_postalcode' => $this->buyer_postalcode, 'buyer_city' => $this->buyer_city]);

    }

    function getAll(){
        $query = "select * from buyer";
        $statement = $this->dbConnection->prepare($query);
        $statement->execute();
        return $statement->fetchAll();
    }

    function getBuyer($buyer_id){
        $query = "select * from buyer WHERE buyer_id=:buyer_id";
        $statement = $this->dbConnection->prepare($query);
        $statement->execute(['buyer_id'=>$buyer_id]);
        return $statement->fetchAll();
    }

    function updateData($updatedData){
        $SQL = "UPDATE buyer SET buyer_username=:buyer_username, buyer_passwordhash=:buyer_passwordhash, buyer_name=:buyer_name, buyer_phone=:buyer_phone, buyer_street=:buyer_street, buyer_postalcode=:buyer_postalcode, buyer_city=:buyer_city WHERE buyer_id=:buyer_id";
        $stmt = $this->dbConnection->prepare($SQL);
        $stmt->execute([
            'buyer_username' => $updatedData[0],
            'buyer_passwordhash' => $updatedData[1],
            'buyer_name' => $updatedData[2],
            'buyer_phone' => $updatedData[3],
            'buyer_street' => $updatedData[4],
            'buyer_postalcode' => $updatedData[5],
            'buyer_city' => $updatedData[6],
            'buyer_id' => $updatedData[7]
        ]);
    }

    function login(){

        $buyer = $this->getBuyerByUsername($this->buyer_username);
        if($buyer){
            if(password_verify($this->buyer_passwordhash, $buyer->buyer_passwordhash)){
                return $buyer;
            }
        }

        return null;
        
    }

    function logout(){

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
        return $statement->fetch(\PDO::FETCH_OBJ);

    }

    public function setBuyerUsername($buyer_username){

        $this->buyer_username = $buyer_username;

    }
   
    public function getBuyerUsername(){

        return $this->buyer_username;

    }

    public function setBuyerPassword($buyer_passwordhash){

        $this->buyer_passwordhash = $buyer_passwordhash;

    }

    public function getBuyerPassword(){

        return $this->buyer_passwordhash;

    }

    public function setBuyerName($buyer_name){

        $this->buyer_name = $buyer_name;

    }
   
    public function getBuyerName(){

        return $this->buyer_name;

    }

    public function setBuyerPhone($buyer_phone){
        $this->buyer_phone = $buyer_phone;

    }
   
    public function getBuyerPhone(){

        return $this->buyer_phone;

    }

    public function setBuyerStreet($buyer_street){

        $this->buyer_street = $buyer_street;

    }
   
    public function getBuyerStreet(){

        return $this->buyer_street;

    }

    public function setBuyerPostalCode($buyer_postalcode){

        $this->buyer_postalcode = $buyer_postalcode;

    }
   
    public function getBuyerPostalCode(){

        return $this->buyer_postalcode;

    }

    public function setBuyerCity($buyer_city){

        $this->buyer_city = $buyer_city;

    }

    public function getBuyerCity(){

        return $this->buyer_city;

    }

    public function getMembershipProvider(){

        return $this->membershipProvider;

    }

    public function setEnabled2FA($enabled2fa){
        $this->enabled2fa = $enabled2fa;
    }

    public function getEnabled2FA(){
        return $this->enabled2fa;
    }

    public function getOTPsecretkey(){

        return $this->otpsecretkey;

    }

    public function getOTPcodeisvalid(){

        return $this->otpcodeisvalid;

    }
    
}
?>