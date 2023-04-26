<?php


namespace controllers;

require(dirname(__DIR__)."/models/buyer.php");

class BuyerController{

    private $buyer;

    function __construct(){

        

        if(isset($_GET)){
            
            if(isset($_GET['action'])){
                $action = $_GET['action'];



                $viewClass = "\\views\\"."Buyer".ucfirst($action);

                $buyer = new \models\Buyer();

                $buyers = $buyer->getAll();
               
                $this->buyer = new \models\Buyer();

                if(isset($_POST)){
                    if(isset($_POST['buyer_username']) && isset($_POST['buyer_passwordhash']) && ($action == 'login' || $action == 'create')){
                        $this->buyer->setBuyerUsername($_POST['buyer_username']);

                        $this->buyer->setBuyerPassword($_POST['buyer_passwordhash']);
                    if($action == 'login'){
                        if(isset($_POST['buyer_username']) && isset($_POST['buyer_passwordhash']) ){

                            $this->buyer->setBuyerUsername($_POST['buyer_username']);

                            $this->buyer = $this->buyer->getBuyerByUsername($_POST['buyer_username'])[0];

                            $this->buyer->setBuyerPassword($_POST['buyer_passwordhash']);

                            //$this->buyer = $this->buyer->getBuyerPassword($_POST['buyer_passwordhash']);

                            $this->buyer->$action();
                        }
                    }else if($action == 'create'){
                        if(isset($_POST['buyer_username']) && isset($_POST['buyer_passwordhash']) ){

                            $this->buyer->setBuyerUsername($_POST['buyer_username']);

                            $this->buyer->setBuyerPassword($_POST['buyer_passwordhash']);

                            $this->buyer->setBuyerName($_POST['buyer_name']);

                            $this->buyer->setBuyerPhone($_POST['buyer_phone']);

                            $this->buyer->setBuyerStreet($_POST['buyer_street']);

                            $this->buyer->setBuyerPostalCode($_POST['buyer_postalcode']);

                            $this->buyer->setBuyerCity($_POST['buyer_city']);

                            $this->buyer->$action();
                        }
                    }    
                }
            }
        
               
                if(isset($_COOKIE)){
                    if(isset($_COOKIE['projectuser'])){

                        $buyer_username = $_COOKIE['projectuser'];
                      
                        $this->buyer = $this->buyer->getBuyerByUsername($buyer_username)[0];
                        $username = $_COOKIE['projectuser'];
                      
                        $this->buyer = $this->buyer->getBuyerByUsername($buyer_username)[0];

                    }
                }
               
                

                if(class_exists($viewClass)){

                    $view = new $viewClass($this->buyer);

                    $view->render($buyers);

                }

                
        }
    }
}
}
?>