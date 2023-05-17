<?php


namespace controllers;

use models\Category;
use models\Product;

require(dirname(__DIR__) . "/models/seller.php");

class ProductController
{
    private $product;
    function __construct()
    {
        session_start();
        if (isset($_GET) && isset($_GET['action'])) {
            $action = $_GET['action'];

            $viewClass = "\\views\\" . "Product" . ucfirst($action);

            $categoryModel = new Category();
            $categories = $categoryModel->getAll();
            if (isset($_SESSION) && isset($_SESSION['seller'])) {
                $sellerData = $_SESSION['seller'];

                if ($action == "index") {
                    $productModel = new Product();
                    $products = $productModel->getSellerProducts($sellerData->seller_id);

                    $view = new $viewClass();
                    $view->render($products);

                }
                elseif ($action == "create" && isset($_POST['create'])) {
                    $this->product = new Product();
                    $this->product->setProductName($_POST['product_name']);
                    $this->product->setProductPrice($_POST['product_price']);
                    $this->product->setProductQuantity($_POST['product_quantity']);

                    if($_FILES['product_image']['name'] != "") {
                        $fileName = $_FILES["product_image"]['name'];
                        $movedFile = move_uploaded_file($_FILES['product_image']['tmp_name'],
                            __DIR__.'../../images/'. $fileName);
                        $this->product->setProductImage($fileName);
                    }

                    $this->product->setProductDescription($_POST['product_description']);
                    $this->product->setCategoryId($_POST['category_id']);
                    $this->product->setSellerId($sellerData->seller_id);
                    $this->product->create();
                    header('location:http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=product&action=index');
                }
                elseif ($action == "edit" && isset($_POST['update'])) {
                     $productModel = new Product();
                     $updateData = $_POST;
                     if($_FILES['product_image']['name'] != "") {
                        $fileName = $_FILES["product_image"]['name'];
                        $movedFile = move_uploaded_file($_FILES['product_image']['tmp_name'],
                            __DIR__.'../../images/'. $fileName);
                         $updateData['product_image'] = $fileName;
                    }
                     $productModel->updateData($updateData);

                    header('location:http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=product&action=index');
                }

                elseif($action == "create"){
                    $view = new $viewClass();
                    $view->render($categories);
                }
                elseif($action == "edit" && $_GET['productId']){
                    $categoryModel = new Category();
                    $categories = $categoryModel->getAll();

                    $productModel = new Product();
                    $productDetail = $productModel->getProductById($_GET['productId']);
                    $view = new $viewClass();
                    $view->render($categories, $productDetail);
                }
                elseif($action == "delete" && $_GET['productId']){
                    $productModel = new Product();
                    $productDetail = $productModel->deleteProductById($_GET['productId']);
                    header('location:http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=product&action=index');
                }
                elseif (class_exists($viewClass)) {
                    $view = new $viewClass();
                    $view->render();
                }
            }
            else {
                header('location:http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=seller&action=login');
            }
        }
    }
}