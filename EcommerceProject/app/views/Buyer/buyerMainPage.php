<html>
    <head>
        <link rel="stylesheet" href="<?= BASE ?>/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= BASE ?>/css/style.css" type="text/css">
        <title><?= _("Buyer Main Page") ?></title>
    </head>
    <body>

        <?php
        echo "<div class='homePageTitle'>" . _("Welcome to the Market") . ", " . $data['buyer']->first_name .
        " " . $data['buyer']->last_name . "! </div>";

        echo "<div class='language'><a href='?lang=en'>" . _("English") . "</a> &#124; ";
        echo "<a href='?lang=fr'>" . _("French") . "</a></div><br><br>";

        echo " <a href='" . BASE . "/Default/logout' class='btn btn-light' style='display:inline; float:right;'> " . _("Logout") . "</a> ";
        echo " <a href='" . BASE . "/Default/editBuyerPassword' class='btn btn-light' style='display:inline; float:right;'>" . _("Change Password") . " </a><br><br><br>";

        echo "<div class='search'> <form method='post' action=''>";
        echo "<label>" . _("Search for a product") . ": <input type='text' name='keyword'/> </label> ";
        echo " <input type='submit' name='action' class='btn btn-secondary' value='" . _("Search") . "!'/>";
        echo "</form></div>";

        echo " <a href='" . BASE . "/Order/index' class='btn btn-info' style='font-size: 20px; display:inline; float:right;'> " . _("View All Orders") . "</a>";
        echo " <a href='" . BASE . "/Cart/index' class='btn btn-primary' style='font-size: 20px; display:inline; float:right;'>" . _("View Your Cart") . " </a><br><br><br>";

        echo "<u><span style='font-size:30px; float:left;'>" . _("Wallet") . ":</span></u>" . "<b><span style='color:#189200; font-size:30px; float:left;'>&nbsp;$" . $data['buyer']->budget . "</b></span><br>";
        echo "<br><a href='" . BASE . "/Buyer/updateBudget' class='btn btn-info' style='display:inline; float:left;'>" . _("EDIT WALLET") . " </a>";

        echo "<br><br>";

        echo "<h1>" . _("Electronics Catalog") . ":</h1><br><br>";
        echo "<hr style='width:100%;text-align:left;margin-left:0'>";

        echo "<div class='row'>";
        foreach ($data['products'] as $product) {
            foreach ($data['sellers'] as $sellers) {
                if ($product->seller_id == $sellers->seller_id) {
                    if ($product->quantity >= 1) {
                        echo "<div class='column'>";
                        echo "<div class='card'>";
                        echo "<div class='card-body'>";
                        echo "<img src='" . BASE . "/uploads/$product->filename' width='100' height='90'/><br><br>";
                        echo "<label><b><i>" . _("Sold By") . ": </b>$sellers->brand_name</i></label><br><br>";
                        echo "<label><b>$product->caption</b></label><br> ";
                        echo "<label>($product->description)</label><br><br>";
                        echo "<label>$$product->price CAD</label><br>";
                        echo "<label>[" . _("STOCK") . ": $product->quantity]</label><br>";
                        echo "<a href='" . BASE . "/Review/index/$product->product_id' class='btn btn-outline-dark'>" . _("View Reviews") . "</a><br><br>";
                        echo "<a href='" . BASE . "/Cart/addToCart/$product->product_id' class='btn btn-success'>" . _("ADD TO CART") . "</a><br><br>";
                        echo "</div></div></div>";
                    } else {
                        echo "<div class='column'>";
                        echo "<div class='card'>";
                        echo "<div class='card-body'>";
                        echo "<img src='" . BASE . "/uploads/$product->filename' width='130' height='90'/><br><br>";
                        echo "<label><b><i>" . _("Sold By") . ": </b>$sellers->brand_name</i></label><br><br>";
                        echo "<label><b>$product->caption</b></label><br> ";
                        echo "<label>($product->description)</label><br><br>";
                        echo "<label>$$product->price CAD</label><br>";
                        echo "<span style='color:#C77800;text-align:center;'> " . _("No more stock of this product") . ".</span><br>";
                        echo "<a href='" . BASE . "/Review/index/$product->product_id' class='btn btn-outline-dark'>" . _("View Reviews") . "</a><br>";
                        echo "</div></div></div>";
                    }
                }
            }
        }
        echo "</div>";

//        echo "</div>";
        echo "<hr style='width:100%;text-align:left;margin-left:0'><br>";
        ?>
    </body>
</html>