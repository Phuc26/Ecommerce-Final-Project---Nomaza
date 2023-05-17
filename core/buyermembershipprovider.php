<?php
namespace membershipprovider;

require(dirname(__DIR__)."/vendor/phpotp/code/rfc6238.php");

class BuyerMembershipProvider{

    private $buyer;

    function __construct($buyer){

        $this->buyer = $buyer;

    }

    function login(){

        session_name("project");

        session_start();

        $_SESSION['buyer_username'] = $this->buyer->getBuyerUsername();

        setcookie('projectuser', $this->buyer->getBuyerUsername(), time()+3600);
        
    }

    function isLoggedIn(){

        session_name("project");

        session_start();

        $isLoggedIn = false;

        if(isset($_SESSION)){
            if(isset($_SESSION['buyer_username'])){
                if($_SESSION['buyer_username'] == $this->buyer->getBuyerUsername()){
                    $isLoggedIn = true;
                }
            }

        }
        
        return $isLoggedIn;

    }

    function logout(){

        $_SESSION = array();

        session_destroy ();

        setcookie('projectuser', $this->buyer->getBuyerUsername(), time()-3600);

    }

    function generateSecretKey(){

        // Generate a secret:

        $otpsecretKey = \TokenAuth6238::generateRandomClue();

        return $otpsecretKey;

    }

    function getCodeforKey($otpsecretkey){

        $otpcode =  \TokenAuth6238::getTokenCode($otpsecretkey);

        return $otpcode;

    }

    function verifyCode($otpsecretKey, $otpcode){

        return  \TokenAuth6238::verify($otpsecretKey, $otpcode);

    }

}


?>