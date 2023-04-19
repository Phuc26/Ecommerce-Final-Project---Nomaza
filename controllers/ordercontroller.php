<?php
namespace controllers;

require_once(dirname(__DIR__)."/models/order.php");

class OrderController{
    function __construct(){
        if(isset($_GET)){
            if(isset($_GET['action'])){
                $action = $_GET['action'];
                $viewFile = "orders".$action;
                $viewClass = "\\views\\order".$action;
                
                if(class_exists($viewClass)){}
            }
        }
    }
}
?>