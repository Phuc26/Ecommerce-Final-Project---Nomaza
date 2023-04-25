<?php
namespace membershipprovider;

class MembershipProvider{

    private $user;

    function __construct($user){

        $this->user = $user;

    }

    function login(){

        session_name("project");

        session_start();

        $_SESSION['username'] = $this->user->getUsername();

        setcookie('projectuser', $this->user->getUsername(), time()+3600);
        
    }

    function isLoggedIn(){

        session_name("project");

        session_start();

        $isLoggedIn = false;

        if(isset($_SESSION)){
            if(isset($_SESSION['username'])){
                if($_SESSION['username'] == $this->user->getUsername()){
                    $isLoggedIn = true;
                }
            }

        }
        
        return $isLoggedIn;

    }

    function logout(){

        $_SESSION = array();

        session_destroy ();

        setcookie('projectuser', $this->user->getUsername(), time()-3600);

    }

}


?>