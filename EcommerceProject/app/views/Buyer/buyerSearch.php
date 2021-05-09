<html>
    <head>
        <link rel="stylesheet" href="<?= BASE ?>/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= BASE ?>/css/style.css" type="text/css">
        <title><?= _("Search Results") ?></title>
    </head>
    <body>
        <?php
        echo "<h2><b>" . _("Results for search") . ", <i>" . $data['keyword'] . "</i>:</b></h2><br><br><br>";
        foreach ($data['products'] as $products) {

            if ($products->quantity >= 1) {
                echo "<div class='search'>";
                echo "<img src='" . BASE . "/uploads/$products->filename' width='120' height='90'/><br><br>";
                echo "<b>$products->caption</b> ";
                echo "(<i>$products->description</i>)<br>";
                echo "$$products->price CAD<br>";
                echo "[" . _("STOCK") . ": $products->quantity]<br>";
                echo "<a href='" . BASE . "/Cart/addToCart/$products->product_id' class='btn btn-success'>" . _("ADD TO CART") . "</a><br><br><br><br>";
                echo "</div>";
            } else {
                echo "<div class='search'>";
                echo "<img src='" . BASE . "/uploads/$products->filename' width='120' height='90'/><br><br>";
                echo "<b>$products->caption</b> ";
                echo "(<i>$products->description</i>)<br>";
                echo "$$products->price CAD<br>";
                echo "[" . _("STOCK") . ": $products->quantity]<br>";
                echo "<span style='color:#C77800;text-align:center;'> " . _("No more stock of this product") . ".</span><br>";
                echo "</div>";
            }
        }

        if (empty($products)) {
            echo _("No products contains the value") . ",   $data[keyword]. " . _("(Please input a valid product caption (name),)");
        }
        echo "<br>";
        echo "<div class='homepageLink'><h4><a href='" . BASE . "/Buyer/index' class='btn btn-light'>&#8592 " . _("Go Back to Main Page") . "</a></h4></div>";
        ?>
    </body>
</html>


