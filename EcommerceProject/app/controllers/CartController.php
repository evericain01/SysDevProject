<?php

namespace App\controllers;

use DateTime;
use DateTimeZone;
use DateInterval;

class CartController extends \App\core\Controller {

    function index() {
        $cart = new \App\models\Cart();
        $buyer = new \App\models\Buyer();
        $products = new \App\models\Product();

        $buyer = $buyer->findUserId($_SESSION['user_id']);

        $sellers = new \App\models\Seller();
        $sellers = $sellers->getAllSellers();

        $buyer = $buyer->find($buyer->buyer_id);
        $cart = $cart->getAllCartProducts($buyer->buyer_id);
        $products = $products->getAllProducts();

        $total = 0;

        foreach ($cart as $carts) {
            foreach ($products as $product) {
                if ($carts->product_id == $product->product_id) {
                    $item_quantity = $carts->product_quantity;
                    $total += $product->price * $item_quantity;
                    break;
                }
            }
        }

        $this->view('Cart/showCart', ['cart' => $cart, 'buyer' => $buyer, 'products'
            => $products, 'sellers' => $sellers, 'total' => $total]);
    }

    function goToConfrimationPage() {
        $buyer = new \App\models\Buyer();

        $buyer = $buyer->findUserId($_SESSION['user_id']);

        $buyer = $buyer->find($buyer->buyer_id);

        $this->view('Cart/checkoutPage', ['buyer' => $buyer]);
    }

    function addToCart($product_id) {
        $product = new \App\models\Product();
        $product = $product->find($product_id);

        $products = new \App\models\Product();
        $products = $products->getAllProducts();

        $buyer = new \App\models\Buyer();
        $buyer = $buyer->findUserId($_SESSION['user_id']);

        $sellers = new \App\models\Seller();
        $sellers = $sellers->getAllSellers();

        $cart = new \App\models\Cart();
        $cart = $cart->find($buyer->buyer_id, $product_id);

        if ($cart === false) {
            if ($product->quantity > 0) {
                $newCart = new \App\models\Cart();

                $newCart->product_id = $product_id;
                $newCart->buyer_id = $buyer->buyer_id;

                $newCart->product_quantity = 1;
                $newCart->insert();
            } else {
                echo "No more stock of this product";
                $this->view('Buyer/buyerMainPage', ['buyer' => $buyer, 'products'
                    => $products, 'sellers' => $sellers]);
            }
        } else {
            if ($product->quantity > 0) {
                $cart->product_quantity += 1;

                $cart->update();
            } else {
                echo "No more stock of this product";
                $this->view('Buyer/buyerMainPage', ['buyer' => $buyer, 'products'
                    => $products, 'sellers' => $sellers]);
            }
        }
        header("location:" . BASE . "/Buyer/index");
    }

    function removeFromCart($product_id) {
        $buyer = new \App\models\Buyer();
        $buyer = $buyer->findUserId($_SESSION['user_id']);

        $product = new \App\models\Product();
        $product = $product->find($product_id);

        $cart = new \App\models\Cart();
        $cart = $cart->find($buyer->buyer_id, $product_id);

        if ($cart->product_quantity > 1) {
            $cart->product_quantity -= 1;

            $cart->update();
        } else {
            $cart->delete();
        }

        header("location:" . BASE . "/Cart/index");
    }

    function dateHelper($datetime) {
        $date = new DateTime($datetime, new DateTimeZone("UTC"));
        $time_zone = new DateTimeZone("UTC");
        $diff1Week = new DateInterval('P7D');
        $date->setTimeZone($time_zone);
        $date_of_arrival = $date->add($diff1Week);
        return $date_of_arrival;
    }

    function checkout($buyer_id) {
        $cart = new \App\models\Cart();
        $cart = $cart->getAllCartProducts($buyer_id);

        $buyer = new \App\models\Buyer();
        $buyer = $buyer->findUserId($_SESSION['user_id']);

        $product = new \App\models\Product();
        $product = $product->getAllProducts();

        $sellers = new \App\models\Seller();
        $sellers = $sellers->getAllSellers();

        $total = 0;

        foreach ($cart as $carts) {
            foreach ($product as $products) {
                if ($carts->product_id == $products->product_id) {
                    $item_quantity = $carts->product_quantity;
                    $total += $products->price * $item_quantity;
                    break;
                }
            }
        }

        if ($buyer->budget >= $total) {
            foreach ($cart as $carts) {
                foreach ($product as $products) {
                    if ($carts->product_id == $products->product_id && $products->quantity >= $carts->product_quantity) {
                        $invoice = new \App\models\Invoice();
                        $currentProduct = new \App\models\Product();
                        $seller = new \App\models\Seller();
                        $currentProduct = $currentProduct->find($products->product_id);
                        $currentProduct->quantity -= $carts->product_quantity;
                        $currentProduct->update();

                        $seller = $seller->find($currentProduct->seller_id);

                        $invoice->buyer_id = $buyer->buyer_id;
                        $invoice->seller_id = $seller->seller_id;
                        $invoice->product_id = $currentProduct->product_id;
                        $invoice->date_of_arrival = $this->dateHelper($invoice->date_of_arrival);
                        $invoice->total = $carts->product_quantity * $currentProduct->price;
                        $invoice->status = "In Transit";

                        $invoice->insert();

                        $buyer->budget -= $total;
                        $buyer->update();

                        $emptyCart = new \App\models\Cart();
                        $emptyCart->checkout($buyer_id);
                    }
                }
            }

            $invoice = new \App\models\Invoice();
            $invoice = $invoice->getAllInvoiceOfBuyer($buyer_id);

            $this->view('Invoice/listInvoice', ['products' => $product,
                'sellers' => $sellers, 'invoice' => $invoice]);
        } else {
            echo '<span style="color:#E90E0A;text-align:center;"><b>Not enough money in account!</b></span>';
            $this->view('Cart/showCart', ['buyer' => $buyer, 'products' => $product,
                'sellers' => $sellers, 'total' => $total, 'cart' => $cart]);
        }
    }

}
