<html>
    <head>
        <link rel="stylesheet" href="<?= BASE ?>/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= BASE ?>/css/style.css" type="text/css">
        <title><?= _("Seller Main Page") ?></title>

    </head>

    <body>
        <?php
        echo "<div class='homePageTitle'>" . _("Welcome") . ", " . $data['seller']->first_name .
        " " . $data['seller']->last_name . "!</div>";

        echo "<div class='language'><a href='?lang=en'>" . _("English") . "</a> &#124; ";
        echo "<a href='?lang=fr'>" . _("French") . "</a></div><br><br>";


        echo "<a href='" . BASE . "/Default/logout' class='btn btn-light' style='float:right;'>" . _("Logout") . "</a>";
        echo "<a href='" . BASE . "/Default/editSellerPassword' class='btn btn-light' style='float:right;'>" . _("Change Password") . "</a>";

        $seller_id = $data['seller']->seller_id;
        echo "<a href='" . BASE . "/Product/add/$seller_id' class='btn btn-primary' style='display:inline; float:left;'>" . _("ADD A PRODUCT") . "</a><br><br>";

        echo "<h3><i>" . _("Company Name") . ": " . $data['seller']->brand_name . "</i></h3>";

        echo "<br><h1>" . _("Your products on sale") . ":</h1><br>";
        echo "<hr style='width:100%;text-align:left;margin-left:0'>";


        echo "<div class='row'>";
        foreach ($data['products'] as $product) {
            if ($product->seller_id == $data['seller']->seller_id) {
                echo "<div class='column'>";
                echo "<div class='card'>";
                echo "<div class='card-body'>";
                echo "<img src='" . BASE . "/uploads/$product->filename' width='115' height='100'/><br><br>";
                echo "<label><b>$product->caption</b></label><br>";
                echo "<label>($product->description)</label><br><br>";
                echo "<label>$$product->price CAD</label><br>";
                echo "<label>[" . _("STOCK") . ": $product->quantity]</label><br>";
                echo "<a href='" . BASE . "/Review/reviewSellerIndex/$product->product_id' class='btn btn-outline-secondary'>" . _("View Reviews") . "</a><br><br>";
                echo "<a href='" . BASE . "/Product/edit/$product->product_id' class='btn btn-warning'>" . _("MODIFY") . "</a> &#124 ";
                echo "<a href='" . BASE . "/Product/delete/$product->product_id' class='btn btn-danger'>" . _("REMOVE") . "</a><br><br>";
                echo "</div></div></div>";
            }
        }
        echo "</div>";
        echo "<hr style='width:100%;text-align:left;margin-left:0'><br>";
        ?>
    </body>
</html>