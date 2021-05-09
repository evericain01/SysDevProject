<html>
    <head>
        <link rel="stylesheet" href="<?= BASE ?>/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= BASE ?>/css/style.css" type="text/css">
        <title><?= _("Orders") ?></title>
    </head>
    <body>
        <h1><?= _("All Orders") ?>:</h1>
        <?php
        echo "<div class='homepageLink'><br><h4><a href='" . BASE . "/Buyer/index' class='btn btn-light'>&#8592 " . _("Go Back to Main Page") . "</a></h4></div><br><br><br>";

        if (empty($data["invoice"])) {
            echo "<i>" . _("You have no orders") . ".</i>";
        }

        echo "<div class='allOrders'>";

        $counter = 0;
        foreach ($data["invoice"] as $invoice) {
            foreach ($data["products"] as $product) {
                if ($invoice->product_id == $product->product_id) {
                    $counter++;
                    echo "<table class='table table-striped' style='width:90%'><thead>";
                    echo "<tr><th scope='col'>#</th><th scope='col'>" . _("Image") . "</th><th scope='col'>" . _("Name") . "</th><th scope='col'>" . _("Description") . "</th><th scope='col'>" . _("Quantity Bought") . "</th><th scope='col'>" . _("Price") . "</th><th scope='col'>" . _("Total Price") . "</th><th scope='col'>" . _("Seller Company") . "</th><th scope='col'>" . _("Date Purchased") . "</th><th scope='col'>" . _("Expected Delivery Date") . "</th></tr></thead>";
                    echo "<tbody><tr> <th scope='row'>$counter</th>";
                    echo "<td><img src='" . BASE . "/uploads/$product->filename' width='80' height='80'/><br><br></td>";
                    echo "<td>$product->caption<br></td>";
                    echo "<td>$product->description<br></td>";
                    $quantity = $invoice->total / $product->price;
                    echo "<td>$quantity<br></td>";
                    echo "<td>$product->price CAD<br></td>";
                    echo "<td>$invoice->total CAD<br></td>";
                    foreach ($data["sellers"] as $seller) {
                        if ($invoice->seller_id == $seller->seller_id) {
                            echo "<td>$seller->brand_name<br><br></td>";
                        }
                    }
                }
            }

            echo "<td>$invoice->timestamp<br></td>";
            echo "<td>$invoice->date_of_arrival<br><br></td></tr></tbody>";

            echo "</table><br>";
            if ($invoice->status == "Delivered") {
                $exist = false;
                $currentProductReviewID = null;

                foreach ($data["reviews"] as $review) {
                    if ($review->buyer_id == $data['buyer']->buyer_id && $review->product_id == $invoice->product_id) {
                        $exist = true;
                        $currentProductReviewID = $review->review_id;
                        break;
                    }
                }

                echo "<b>" . _("STATUS") . ": <span style='color:#398C0C;font-size:20px;text-align:center;'> " . _("Delivered") . " </span></b>";
                if ($exist == true) {
                    echo "<br><b><a href='" . BASE . "/Review/edit/$currentProductReviewID' class='btn btn-outline-primary'>" . _("Edit Review") . "</a></b>&#124";

                    echo "<a href='" . BASE . "/Review/remove/$review->review_id' class='btn btn-outline-danger'>" . _("DELETE REVIEW") . "</a><br><br></td></tr>";
                } else {
                    echo "<br><b><a href='" . BASE . "/Review/add/$invoice->product_id' class='btn btn-outline-primary'>" . _("Leave a Review") . "?</a></b><br><br><br>";
                }
            } else {
                echo "<b>" . _("STATUS") . ": <span style='color:#C77800;font-size:20px;text-align:center;'> " . _("In Transit") . " </b></span>";
                echo "<a href='" . BASE . "/Order/updateStatus/$invoice->invoice_id' class='btn btn-outline-secondary'>" . _("Recieved") . "?</a><br><br>";
            }
            echo "<hr style='width:100%;text-align:left;margin-left:0'><br>";
        }

        echo "</div>";
        ?>
    </body>
</html>
