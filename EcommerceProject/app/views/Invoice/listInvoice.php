<html>
    <head>
        <link rel="stylesheet" href="<?= BASE ?>/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= BASE ?>/css/style.css" type="text/css">
        <title><?= _("Invoice") ?></title>
    </head>
    <body>
        <h2><?= _("Invoice") ?>:</h2>

        <?php
        echo "<div class='homepageLink'><h4><a href='" . BASE . "/Buyer/index' class='btn btn-light'>&#8592 " . _("Go Back to Main Page") . "</a></h4></div><br><br>";

        $date = new DateTime(null, new DateTimeZone("America/Toronto"));
        $result = $date->format('Y-m-d H:i:s');
        
        echo "<div class='invoices'>";
        
        foreach ($data["invoice"] as $invoice) {
            foreach ($data["products"] as $product) {
                if ($invoice->product_id == $product->product_id && $invoice->timestamp == $result) {

                    echo "<b>" . _("Item Name") . ":</b> $product->caption<br>";
                    echo "<b>" . _("Item Description") . ":</b> $product->description<br>";
                    $quantity = $invoice->total / $product->price;
                    echo "<b>" . _("Quantity") . ":</b> $quantity<br>";
                    echo "<b>" . _("Cost Per Item") . ":</b> $product->price CAD<br>";
                    echo "<b>" . _("Total") . ":</b> $invoice->total CAD<br>";
                    foreach ($data["sellers"] as $seller) {
                        if ($invoice->seller_id == $seller->seller_id) {
                            echo "<b>" . _("Seller Company") . ": </b>$seller->brand_name<br><br>";
                        }
                    }
                    echo _("DATE PURCHASED") . ": $invoice->timestamp<br>";

                    echo _("EXPECTED DELIVERY DATE") . ": $invoice->date_of_arrival<br><br>";
                    echo "<hr style='width:325px;text-align:left;margin-left:0'><br>";
                }
            }
        }
        
        echo "</div>";
        ?>
    </body>
</html>

