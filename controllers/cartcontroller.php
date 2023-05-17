<?php


namespace controllers;


use models\Cart;
use models\Product;

require(dirname(__DIR__) . "/models/buyer.php");

class CartController
{
    private $cart;

    function __construct()
    {
        session_start();
        $buyerData = $_SESSION['buyer'];
        if (isset($_GET['action'])) {

            $action = $_GET['action'];
            $viewClass = "\\views\\" . "Cart" . ucfirst($action);

            $this->cart = new \models\Cart();
            if($action == "add" && !empty($_GET['productId'])){
                $productId = $_GET['productId'];
                
                $productModel = new Product();
                $product = $productModel->getProductById($productId);

                $this->cart->setProductId($productId);
                $this->cart->setQty(1);
                $this->cart->setPrice($product->product_price);
                $this->cart->setBuyerId($buyerData->buyer_id);
                $this->cart->create();
                header("location:http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=cart&action=index");
            }
            if($action == "index"){
                $cartModel = new Cart();
                $cartData = $cartModel->getBuyerCartData($buyerData->buyer_id);
                $view = new $viewClass();
                $view->render($cartData);
            }
            if($action == "delete" && !empty($_GET['cartId'])){
                $this->cart->setCartId($_GET['cartId']);
                $this->cart->removeFromCart();
                header("location:http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=cart&action=index");

            }
        }
    }
}