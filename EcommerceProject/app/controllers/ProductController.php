<?php

namespace App\controllers;

class ProductController extends \App\core\Controller {

    function add() {
        if (isset($_POST["action"])) {
            if (isset($_FILES['myImage'])) {
                $imageProperties = getimagesize($_FILES['myImage']['tmp_name']);
                $allowedTypes = ['image/gif', 'image/jpeg', 'image/png'];
                if ($imageProperties !== false && in_array($imageProperties['mime'], $allowedTypes)) {
                    $extension = ['image/gif' => 'gif', 'image/jpeg' => 'jpg', 'image/png' => 'png'];
                    $extension = $extension[$imageProperties['mime']];
                    $target_folder = 'uploads/';

                    $targetFile = uniqid() . ".$extension";
                    if (move_uploaded_file($_FILES['myImage']['tmp_name'], $target_folder . $targetFile)) {
                        $product = new \App\models\Product();

                        $seller = new \App\models\Seller();
                        $seller = $seller->findUserId($_SESSION['user_id']);

                        $product->seller_id = $seller->seller_id;
                        $product->caption = $_POST["caption"];
                        $product->filename = $targetFile;
                        $product->description = $_POST["description"];
                        $product->quantity = $_POST["quantity"];
                        $product->price = $_POST["price"];

                        $product->insert();
                        header("location:" . BASE . '/Seller/index');
                    } else {
                        echo 'error';
                    }
                } else {
                    echo "INVALID: Please input an image of type '.gif', '.jpeg' or '.png'.<br><br>";
                    // echo "<a href='" . BASE . "/Seller/add'>&#8592 Go Back to Upload</a>";
                }
            }
        } else {
            $seller = new \App\models\Seller();
            $seller = $seller->findUserId($_SESSION['user_id']);

            $product = new \App\models\Product();

            $this->view('Product/addProduct', ['product' => $product, 'seller' => $seller]);
        }
    }

    function edit($product_id) {
        $product = new \App\models\Product();
        $product = $product->find($product_id);
        if (isset($_POST["action"])) {
            $product->caption = $_POST["caption"];
            $product->description = $_POST["description"];
            $product->filename = $_POST["filename"];
            $product->quantity = $_POST["quantity"];
            $product->price = $_POST["price"];

            $product->update();
            header("location:" . BASE . "/Seller/index");
        } else {
            $this->view('Product/editProduct', $product);
        }
    }

    function delete($product_id) {
        $product = new \App\models\Product();
        $product = $product->find($product_id);

        $path = getcwd() . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $product->filename;
        unlink($path);
        $product->delete();

        header("location:" . BASE . "/Seller/index");
    }
}

?>