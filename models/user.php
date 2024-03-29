<?php
namespace models;

require_once(dirname(__DIR__)."/core/dbconnectionmanager.php");

require(dirname(__DIR__)."/core/membershipprovider.php");

class User{

    public $id;
    private $username;
    private $password;
    private $otpsecretkey;

    private $dbConnection;

    private $membershipProvider;

    function __construct(){

        $conManager = new \database\DBConnectionManager();

        $this->dbConnection = $conManager->getConnection();

        $this->membershipProvider = new \membershipprovider\MembershipProvider($this);

    }

    function create(){


        $query = "INSERT INTO users (username, password) VALUES(:username, :password)";

        $statement = $this->dbConnection->prepare($query);


        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);

        return $statement->execute(['username' => $this->username, 'password'=> $hashedPassword]);

    }

    function login(){


        $verified = false;

        $dbPassword = $this->getPasswordByUsername();

        if(password_verify($this->password, $dbPassword)){

            $verified = true;

        }

        return $verified;
        
    }

    function logout(){

        $this->membershipProvider->logout();

    }

    function getPasswordByUsername(){

        $query = "SELECT password FROM users WHERE username = :username";

        $statement = $this->dbConnection->prepare($query);
        
        $statement->execute(['username'=> $this->username]);

        return $statement->fetchColumn(0);

    }

    function getUserByUsername($username){

        $query = "SELECT * FROM users WHERE username = :username";

        $statement = $this->dbConnection->prepare($query);
        
        $statement->execute(['username'=> $username]);



        return $statement->fetchAll(\PDO::FETCH_CLASS, User::class);

    }

    public function setuptwofa(){

        $this->otpsecretkey = $this->membershipProvider->generateSecretKey();
 
        $this->saveotpSecretKey();

    }

    private function saveotpSecretKey(){
        
        $query = "UPDATE users SET otpsecretkey = :otpsecretkey WHERE id = :id";

        $statement = $this->dbConnection->prepare($query);

        $statement->execute(['otpsecretkey'=> $this->otpsecretkey, 'id' => $this->id]);

    }


    public function setUsername($username){

        $this->username = $username;

    }
   
    public function getUsername(){

        return $this->username;

    }

    public function getPassword(){

        return $this->password;

    }

    public function setPassword($password){

        $this->password = $password;

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

}

?>