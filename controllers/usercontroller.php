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
                    if(isset($_POST['username']) && isset($_POST['password'])){
                        $this->user->setUsername($_POST['username']);

                        $this->user->setPassword($_POST['password']);

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