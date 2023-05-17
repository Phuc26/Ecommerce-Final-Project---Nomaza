<?php
namespace controllers;

use models\Cart;
use models\Order;

require_once(dirname(__DIR__)."/models/order.php");

class OrderController{
    private $order;
    private $cart;
    function __construct(){
        if(isset($_GET)){
            if(isset($_GET['action'])){
                $action = $_GET['action'];
                $viewFile = "orders".$action;
                $viewClass = "\\views\\order".$action;
                session_start();
                if(!empty($_SESSION['buyer'])){
                    $buyerId = $_SESSION['buyer']->buyer_id;
                    if($action == "create"){
                        $cartModel = new Cart();
                        $cartData = $cartModel->getBuyerCartData($buyerId);
                        foreach ($cartData as $cart){
                            $this->order = new Order();
                            $this->order->setProductId($cart->product_id);
                            $this->order->setBuyerId($cart->buyer_id);
                            $this->order->setPrice($cart->price);
                            $this->order->setOrderStatus("new");
                            $this->order->orderCreate();

                            $this->cart = new Cart();
                            $this->cart->setCartId($cart->cart_id);
                            $this->cart->removeFromCart();

                        }
                        header("location:http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=order&action=buyerList");

                    }
                    if($action == "buyerList"){
                        $orderModel = new Order();
                        $buyerOrders = $orderModel->getBuyerOrders($buyerId);
                        $view = new $viewClass();
                        $view->render($buyerOrders);

                    }
                    if($action == "cancel" && !empty($_GET['orderId'])){
                        $this->order = new Order();
                        $this->order->setOrderStatus('cancelled');
                        $this->order->setOrderId($_GET['orderId']);
                        $this->order->orderStatusUpdate();

                        header("location:http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=order&action=buyerList");

                    }
                }
                if(!empty($_SESSION['seller'])){
                    $seller = $_SESSION['seller'];
                    if($action == "history"){
                        $order = new Order();
                        $sellerOrders = $order->getSellerOrders($seller->seller_id);
                        $view = new $viewClass();
                        $view->render($sellerOrders);
                    }
                    if($action == "shipped" && !empty($_GET['orderId'])){
                        $this->order = new Order();
                        $this->order->setOrderStatus('shipped');
                        $this->order->setOrderId($_GET['orderId']);
                        $this->order->orderStatusUpdate();

                        header("location:http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=order&action=history");

                    }
                    if($action == "cancel" && !empty($_GET['orderId'])){
                        $this->order = new Order();
                        $this->order->setOrderStatus('cancelled');
                        $this->order->setOrderId($_GET['orderId']);
                        $this->order->orderStatusUpdate();

                        header("location:http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=order&action=history");

                    }
                }
                

            }
        }
    }
}
?>