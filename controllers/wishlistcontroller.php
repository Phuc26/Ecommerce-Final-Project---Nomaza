<?php


namespace controllers;

use models\Wishlist;

require(dirname(__DIR__) . "/models/buyer.php");

class WishlistController
{
    private $wishlist;

    function __construct()
    {
        session_start();
        $buyerData = $_SESSION['buyer'];
        if (isset($_GET['action'])) {

            $action = $_GET['action'];
            $viewClass = "\\views\\" . "Wishlist" . ucfirst($action);
            $this->wishlist = new Wishlist();
            if($action == "add" && !empty($_GET['productId'])){
                $productId = $_GET['productId'];

                $this->wishlist->setProductId($productId);
                $this->wishlist->setBuyerId($buyerData->buyer_id);
                $this->wishlist->create();
                header("location:http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=wishlist&action=index");
            }
            if($action == "index"){
                $cartModel = new Wishlist();
                $cartData = $cartModel->getBuyerData($buyerData->buyer_id);
                $view = new $viewClass();
                $view->render($cartData);
            }
            if($action == "delete" && !empty($_GET['wishlistId'])){
                $this->wishlist->setWishlistId($_GET['wishlistId']);
                $this->wishlist->removeFromWishlist();
                header("location:http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=wishlist&action=index");

            }
        }
    }
}