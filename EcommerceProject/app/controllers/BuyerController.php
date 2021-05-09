<?php

namespace App\controllers;

class BuyerController extends \App\core\Controller {

    #[\App\core\BuyerFilter]
    function index() {
        if (isset($_POST["action"])) {
            $keyword = $_POST["keyword"];
            $product = new \App\models\Product();
            $product = $product->searchProducts($keyword);
            if ($keyword == "") {
                echo _("INVALID: no products found") . "<br><br>";
                echo "<a href='" . BASE . "/Buyer/index/'>&#8592 Go back</a>";
            } else {
                $this->view('Buyer/buyerSearch', ['keyword' => $keyword, 'products' => $product]);
            }
        } else {
            $products = new \App\models\Product();
            $products = $products->getAllProducts();

            $sellers = new \App\models\Seller();
            $sellers = $sellers->getAllSellers();

            $buyer = new \App\models\Buyer();
            $buyer = $buyer->findUserId($_SESSION['user_id']);

            $invoice = new \App\models\Invoice();
            $invoice = $invoice->getAllInvoiceOfBuyer($buyer->buyer_id);
            
            $this->view('Buyer/buyerMainPage', ['products' => $products, 'buyer' => $buyer, 'sellers' => $sellers, 'invoice' => $invoice]);
        }
    }

    function createProfile() {
        if (isset($_POST["action"])) {
            $buyer = new \App\models\Buyer();
            $buyer->user_id = $_SESSION['user_id'];
            $buyer->first_name = $_POST["first_name"];
            $buyer->budget = $_POST["budget"];
            $buyer->last_name = $_POST["last_name"];
            $buyer->insert();
            header("location:" . BASE . "/Buyer/index/$buyer->buyer_id");
        } else {
            $buyer = new \App\models\Buyer();
            $buyer = $buyer->findUserId($_SESSION['user_id']);
            $this->view('Buyer/createBuyerProfile', $buyer);
        }
    }

    function updateBudget() {
        if (isset($_POST["action"])) {
            $buyer = new \App\models\Buyer();
            $buyer = $buyer->findUserId($_SESSION['user_id']);
            $buyer->first_name = $buyer->first_name;
            $buyer->budget = $_POST["budget"];
            $buyer->last_name = $buyer->last_name;
            $buyer->update();
            header("location:" . BASE . "/Buyer/index/$buyer->buyer_id");
        } else {
            $buyer = new \App\models\Buyer();
            $buyer = $buyer->findUserId($_SESSION['user_id']);
            $this->view('Buyer/modifyBudget', $buyer);
        }
    }

}

?>