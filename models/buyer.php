<?php
require(dirname(__DIR__)."/core/dbconnection.php");

require(dirname(__DIR__)."/core/membershipprovider.php");

class Buyer{
    private $buyer_id;
    private $buyer_username;
    private $buyer_passwordhash;
    private $buyer_name;
    private $buyer_phone;
    private $buyer_street;
    private $buyer_postalcode;
    private $buyer_city;

    private $dbConnection;

    private $membershipProvider;

    function __construct(){
        $conManager = new \database\DBConnectionManager();
        $this->dbConnection = $conManager->getConnection();
        $this->membershipProvider = new \membershipprovider\MembershipProvider($this);
    }

    function create(){
       

        $query = "INSERT INTO users (buyer_username, buyer_passwordhash, buyer_name, buyer_phone, buyer_street, buyer_postalcode, buyer_city )
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

    public function getMembershipProvider(){

        return $this->membershipProvider;

    }

}
?>