<?php


namespace controllers;

require(dirname(__DIR__)."/models/seller.php");

class SellerController{

    private $user;

    function __construct(){

        

        if(isset($_GET)){
            
            if(isset($_GET['action'])){
                $action = $_GET['action'];



                $viewClass = "\\views\\"."Seller".ucfirst($action);

                $seller = new \models\Seller();

                $seller = $seller->getAll();
               
                $this->seller = new \models\Seller();

                if(isset($_POST)){
                    if(isset($_POST['buyer_username']) && isset($_POST['buyer_passwordhash']) && ($action == 'login' || $action == 'create')){
                        $this->seller->setBuyerUsername($_POST['buyer_username']);

                        $this->seller->setBuyerPassword($_POST['buyer_passwordhash']);
                    if($action == 'login'){
                        if(isset($_POST['buyer_username']) && isset($_POST['buyer_passwordhash']) ){

                            $this->seller->setBuyerUsername($_POST['buyer_username']);

                            $this->seller = $this->seller->getBuyerByUsername($_POST['buyer_username']);

                            $this->seller->setBuyerPassword($_POST['buyer_passwordhash']);

                            $this->seller = $this->seller->getBuyerPassword($_POST['buyer_passwordhash']);

                            $this->seller->$action();
                        }
                    }else if($action == 'create'){
                        if(isset($_POST['buyer_username']) && isset($_POST['buyer_passwordhash']) ){

                            $this->seller->setBuyerUsername($_POST['buyer_username']);

                            $this->seller->setBuyerPassword($_POST['buyer_passwordhash']);

                            $this->seller->setBuyerName($_POST['buyer_name']);

                            $this->seller->setBuyerPhone($_POST['buyer_phone']);

                            $this->seller->setBuyerStreet($_POST['buyer_street']);

                            $this->seller->setBuyerPostalCode($_POST['buyer_postalcode']);

                            $this->seller->setBuyerCity($_POST['buyer_city']);

                            $this->seller->$action();
                        }
                    }    
                }
            }
                
                $this->user = new \models\Seller();
               
                if(isset($_COOKIE)){
                    if(isset($_COOKIE['projectuser'])){

                        $buyer_username = $_COOKIE['projectuser'];
                      
                        $this->buyer = $this->buyer->getUserByUsername($buyer_username)[0];
                        $username = $_COOKIE['projectuser'];
                      
                        $this->user = $this->user->getUserByUsername($buyer_username)[0];

                    }
                }
               
                

                if(class_exists($viewClass)){

                    $view = new $viewClass($this->seller);

                    $view->render($sellers);

                }

                
        }
    }
}
}
?>