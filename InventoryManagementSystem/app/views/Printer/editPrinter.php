<html>
    <head>
        <link rel="stylesheet" href="<?= BASE ?>/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= BASE ?>/css/style.css" type="text/css">
        <title>Edit Printer</title>
    </head>

    <body>
        <?php
        echo "<b style='font-size: 25px;'>Printer: " . $data->printer_brand . " " . $data->printer_model . "</b><br><br><br><br>";
        ?>

        <form style='text-align:left' method="post" action="">
            <label>New Quantity: <input type="number" step="1" min="0" name="quantity" style="width: 53px;" value="<?= $data->quantity ?>"/></label><br><br>
            <input type="submit" name="action" class="btn btn-success" value="Submit Changes" />
        </form>

        <?php
        echo "<br><br><div class='homepageLink'><h4><a href='" . BASE . "/Printer/index' class='btn btn-light'>&#8592 Go Back to Printer Stock</a></h4></div>";
        ?>

    </body>
</html>