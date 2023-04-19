<?php
namespace controllers;

require(dirname(__DIR__)."/models/user.php");

class UserController{

    private $user;

    function __construct(){

        if(isset($_GET)){
            if(isset($_GET['action'])){

                $action = $_GET['action'];

                $viewClass = "\\views\\"."User".ucfirst($action);

                $this->user = new \models\User();                 

                if(isset($_POST)){
                    if(isset($_POST['username']) && isset($_POST['password']) && ($action == 'login' || $action == 'create')){
                        $this->user->setUsername($_POST['username']);

                        $this->user->setPassword($_POST['password']);
                        
                        if(isset($_POST['enable2fa']))
                            $this->user->setEnabled2FA($_POST['enable2fa'] == 'true' ? true : false);

                        $this->user->$action();

                    }else if(($action == 'setuptwofa')){

                        if (isset($_COOKIE['hrappuser']))
                            $username = $_COOKIE['hrappuser'];

                        $this->user = $this->user->getUserByUsername($username)[0];

                        $this->user->$action();
    
                    }
                }

                if(class_exists($viewClass)){

                    $view = new $viewClass($this->user);

                }
            }
        }
    }
}

?>