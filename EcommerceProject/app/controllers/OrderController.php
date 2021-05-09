<?php

namespace App\controllers;

class OrderController extends \App\core\Controller {

    function index() {
        $buyer = new \App\models\Buyer();
        $buyer = $buyer->findUserId($_SESSION['user_id']);

        $invoices = new \App\models\Invoice();
        $invoices = $invoices->getAllInvoiceOfBuyer($buyer->buyer_id);

        $sellers = new \App\models\Seller();
        $sellers = $sellers->getAllSellers();

        $products = new \App\models\Product();
        $products = $products->getAllProducts();

        $review = new \App\models\Review();
        $review = $review->getAllReviewsOfBuyer($buyer->buyer_id);
        
        $this->view('Order/listAllOrders', [
            'products' => $products, 'buyer' => $buyer, 'sellers' => $sellers,
            'invoice' => $invoices, 'reviews' => $review
        ]);
    }
    
    function updateStatus($invoice_id) {
        $invoice = new \App\models\Invoice();
        $invoice = $invoice->findInvoiceId($invoice_id);
        
        $invoice->status = "Delivered";
        $invoice->update();

        header("location:" . BASE . "/Order/index");
    }
}
