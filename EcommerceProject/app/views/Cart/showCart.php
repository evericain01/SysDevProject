<html>
    <head>
        <link rel="stylesheet" href="<?= BASE ?>/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= BASE ?>/css/style.css" type="text/css">
        <title><?= _("Cart") ?></title>
    </head>
    <?php
    echo "<h1>" . _("Your Cart") . ":</h1><br>";

    if (!$data['total'] == 0) {
        echo "<h3>" . _("TOTAL COST") . ": $" . $data['total'] . " CAD</h3><br>";
        echo "<hr style='width:100%;text-align:left;margin-left:0'><br>";
        echo "<table class='table' style='width:75%'>";
        echo "<thead class='thead-dark'><tr><th scope='col'>#</th><th scope='col'>" . _("Image") . "</th><th scope='col'>" . _("Sold By") . "</th><th scope='col'>" . _("Product Name") . "</th><th scope='col'>" . _("Description") . "</th><th scope='col'>" . _("Price") . "</th><th scope='col'>" . _("Quantity") . "</th><th scope='col'></th></tr></thead>";
    } else {
        echo "<i>" . _("Your cart is empty") . ".</i>";
    }

    $counter = 0;
    $enoughQuantity = true;
    
    foreach ($data['cart'] as $cart) {
        foreach ($data['products'] as $product) {
            if ($product->quantity < $cart->product_quantity) {
                if ($cart->product_id == $product->product_id) {
                    $enoughQuantity = false;
                    echo "<br><span style='font-size: 20px; color:red;'>". _("NOT ENOUGH STOCK! Please decrease the quantity for the").": $product->caption</span><br><br>";
                    foreach ($data['sellers'] as $sellers) {
                        if ($product->seller_id == $sellers->seller_id) {
                            $counter++;
                            echo "<tbody>";
                            echo "<tr> <th scope='row'>$counter</th>";
                            echo "<td><img src='" . BASE . "/uploads/$product->filename' width='100' height='70'/><br><br></td>";
                            echo "<td><b><i>$sellers->brand_name</i><br><br></td>";
                            echo "<td><b>$product->caption</b></td> ";
                            echo "<td>($product->description)<br></td>";
                            echo "<td>$$product->price CAD<br></td>";
                            echo "<td>$cart->product_quantity<br></td>";
                            echo "<td><a href='" . BASE . "/Cart/removeFromCart/$product->product_id' class='btn btn-danger'>" . _("REMOVE") . "</a><br><br></td></tr>";
                            echo "</tbody>";
                        }
                    }
                }
            } else {
                if ($cart->product_id == $product->product_id) {
                    foreach ($data['sellers'] as $sellers) {

                        if ($product->seller_id == $sellers->seller_id) {
                            $counter++;
                            echo "<tbody>";
                            echo "<tr> <th scope='row'>$counter</th>";
                            echo "<td><img src='" . BASE . "/uploads/$product->filename' width='100' height='70'/><br><br></td>";
                            echo "<td><b><i>$sellers->brand_name</i><br><br></td>";
                            echo "<td><b>$product->caption</b></td> ";
                            echo "<td>($product->description)<br></td>";
                            echo "<td>$$product->price CAD<br></td>";
                            echo "<td>$cart->product_quantity<br></td>";
                            echo "<td><a href='" . BASE . "/Cart/removeFromCart/$product->product_id' class='btn btn-danger'>" . _("REMOVE") . "</a><br><br></td></tr>";
                            echo "</tbody>";
                        }
                    }
                }
            }
        }
    }

    echo "</table><br><br>";


    echo "<div class='homepageLink'><h4><a href='" . BASE . "/Buyer/index' class='btn btn-light'>&#8592 " . _("Go Back to Main Page") . "</a></h4></div>";
    if (!$data['total'] == 0 && $enoughQuantity == true) {
        echo "<h2><b><a href='" . BASE . "/Cart/goToConfrimationPage' class='btn btn-success'>" . _("CHECKOUT") . "</a></b></h2>";
    }
    ?>

</body>
</html>

