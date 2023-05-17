<?php


namespace controllers;


require(dirname(__DIR__) . "/models/seller.php");

class SellerController
{

    private $seller;

    function __construct()
    {

        if (isset($_GET)) {
            session_start();
            if (isset($_GET['action'])) {
                $action = $_GET['action'];

                $viewClass = "\\views\\" . "Seller" . ucfirst($action);

                $seller = new \models\Seller();

                $sellers = $seller->getAll();

                $this->seller = new \models\Seller();

                if (isset($_POST)) {
                    if (isset($_POST['seller_username']) && isset($_POST['seller_passwordhash']) &&
                        ($action == 'login' || $action == 'create')) {
                        $this->seller->setSellerUsername($_POST['seller_username']);

                        $this->seller->setSellerPassword($_POST['seller_passwordhash']);
                        if ($action == 'login') {
                            if (isset($_POST['seller_username']) && isset($_POST['seller_passwordhash'])) {
                                $this->seller->setSellerUsername($_POST['seller_username']);


                                $this->seller->setSellerPassword($_POST['seller_passwordhash']);

                                $sellerData = $this->seller->$action();
                                if($sellerData){
                                    $_SESSION['seller'] = $sellerData;
                                    header('Location:http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=product&action=index');

                                }

                            }
                        }
                        else if ($action == 'create') {
                            if (isset($_POST['seller_username']) && isset($_POST['seller_passwordhash'])) {

                                $this->seller->setSellerUsername($_POST['seller_username']);

                                $this->seller->setSellerPassword($_POST['seller_passwordhash']);

                                $this->seller->setSellerName($_POST['seller_name']);

                                $this->seller->setSellerPhone($_POST['seller_phone']);

                                $this->seller->$action();

                                header('Location:http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=seller&action=login');

                            }
                        }
                    }
                }

                if($action == "logout"){
                    session_destroy();
                    header('Location:http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=seller&action=login');
                }

                if (class_exists($viewClass)) {
                    $view = new $viewClass($this->seller);
                    $view->render($seller);
                }


            }
        }
    }

}

?>