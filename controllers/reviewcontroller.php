<?php

namespace controllers;

use models\Review;

require_once(dirname(__DIR__) . "/models/order.php");

class ReviewController
{
    private $review;

    function __construct()
    {
        if (isset($_GET)) {
            if (isset($_GET['action'])) {
                $action = $_GET['action'];
                $viewClass = "\\views\\review" . $action;

                session_start();
                if (!empty($_SESSION['buyer'])) {
                    $buyer = $_SESSION['buyer'];
                    if ($action == "create" && !empty($_POST['rating'])) {
                        $this->review = new Review();
                        $this->review->setReviewComment($_POST['comment']);
                        $this->review->setReviewRating($_POST['rating']);
                        $this->review->setProductId($_GET['productId']);
                        $this->review->setBuyerId($buyer->buyer_id);
                        $this->review->create();
                        header("location:http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=order&action=buyerList");
                    }

                    if (class_exists($viewClass)) {
                        $view = new $viewClass();
                        $view->render();
                    }
                }
            }

        }
    }
}