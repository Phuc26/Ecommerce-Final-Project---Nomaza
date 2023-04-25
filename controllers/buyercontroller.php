<?php


namespace controllers;

require(dirname(__DIR__)."/models/buyer.php");

class BuyerController{

    private $user;

    function __construct(){

        if(isset($_GET)){
            if(isset($_GET['action'])){
                $action = $_GET['action'];



                $viewClass = "\\views\\"."Buyer".ucfirst($action);

                $buyer = new \models\Buyer();

                $buyers = $buyer->getAll();
               
                $this->user = new \models\Buyer();
               
                if(isset($_COOKIE)){
                    if(isset($_COOKIE['projectuser'])){

                        $username = $_COOKIE['projectuser'];
                      
                        $this->user = $this->user->getUserByUsername($buyer_username)[0];

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