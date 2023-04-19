<?php


namespace controllers;

require(dirname(__DIR__)."/models/buyer.php");

require(dirname(__DIR__)."/models/user.php");

class EmployeeController{

    private $user;

    function __construct(){

        if(isset($_GET)){
            if(isset($_GET['action'])){
                $action = $_GET['action'];



                $viewClass = "\\views\\"."Buyer".ucfirst($action);

                $buyer = new \models\Buyer();

                $buyers = $buyer->getAll();
               
                $this->user = new \models\User();
               
                if(isset($_COOKIE)){
                    if(isset($_COOKIE['hrappuser'])){

                        $username = $_COOKIE['hrappuser'];
                      
                        $this->user = $this->user->getUserByUsername($username)[0];

                    }
                }
               
                if(class_exists($viewClass)){

                    $view = new $viewClass($this->user);

                    $view->render($buyers);

                }
            }
        }
    }
}

?>