<?php
namespace controllers;
require_once(dirname(__DIR__)."/models/order.php");

class MainController{
    function __construct(){
        if(isset($_GET)){
            if(isset($_GET['action'])){
                $action = $_GET['action'];
                $viewFile = "main".$action;
                $viewClass = "\\views\\main".$action;
                
                if(class_exists($viewClass)){}
            }
        }
    }
}
?>