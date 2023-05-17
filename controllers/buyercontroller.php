<?php


namespace controllers;

use models\Category;
use models\Product;

require(dirname(__DIR__) . "/models/buyer.php");

class BuyerController
{

    private $buyer;

    function __construct()
    {
        if (isset($_GET)) {
            session_start();
            if (isset($_GET['action'])) {
                $action = $_GET['action'];


                $viewClass = "\\views\\" . "Buyer" . ucfirst($action);

                $buyer = new \models\Buyer();

                $buyers = $buyer->getAll();

                $this->buyer = new \models\Buyer();
                if (isset($_POST)) {
                    if (isset($_POST['buyer_username']) && isset($_POST['buyer_passwordhash'])) {
                        $this->buyer->setBuyerUsername($_POST['buyer_username']);

                        $this->buyer->setBuyerPassword($_POST['buyer_passwordhash']);
                        if ($action == 'login') {

                            $this->buyer->setBuyerUsername($_POST['buyer_username']);

                            $this->buyer->setBuyerPassword($_POST['buyer_passwordhash']);

                            $buyer = $this->buyer->$action();
                            if ($buyer) {
                                $_SESSION['buyer'] = $buyer;
                                header('location:http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=buyer&action=index');
                            }
                        } else if ($action == 'create') {

                            $this->buyer->setBuyerUsername($_POST['buyer_username']);

                            $this->buyer->setBuyerPassword($_POST['buyer_passwordhash']);

                            $this->buyer->setBuyerName($_POST['buyer_name']);

                            $this->buyer->setBuyerPhone($_POST['buyer_phone']);

                            $this->buyer->setBuyerStreet($_POST['buyer_street']);

                            $this->buyer->setBuyerPostalCode($_POST['buyer_postalcode']);

                            $this->buyer->setBuyerCity($_POST['buyer_city']);

                            $this->buyer->$action();
                            header('location:http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=buyer&action=login');

                        }
                    }
                }

                if ($action == "index") {
                    if (isset($_SESSION['buyer'])) {
                        $productModel = new Product();
                        if(isset($_GET['filter'])){
                            $products = $productModel->getAllByFilter($_GET);
                        }else{
                            $products = $productModel->getAll();
                        }


                        $categoryModel = new Category();
                        $categories = $categoryModel->getAll();

                        $view = new $viewClass();
                        $view->render($products, $categories);
                    } else {
                        header('location:http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=buyer&action=login');

                    }
                }
                elseif($action == "productDetail" && isset($_GET['productId'])){
                    $productModel = new Product();
                    $product = $productModel->getProductById($_GET['productId']);

                    $view = new $viewClass();
                    $view->render($product);
                }
                elseif ($action == "logout") {
                    session_destroy();
                    header('location:http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=buyer&action=login');
                }
                elseif (class_exists($viewClass)) {

                    $view = new $viewClass($this->buyer);

                    $view->render($buyers);

                }


            }
        }
    }
}

?>