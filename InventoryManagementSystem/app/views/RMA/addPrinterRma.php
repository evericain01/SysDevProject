<html>
    <head>
        <link rel="stylesheet" href="<?= BASE ?>/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= BASE ?>/css/style.css" type="text/css">
        <title>Add Printer RMA</title>
    </head>

    <body>
        <?php
        echo "<b style='font-size: 25px;'>Printer: " . $data->printer_brand . " " . $data->printer_model . "</b><br><br>";
        if (isset($_GET['error']))
            echo "<div style='color: red; font-size:20px'>" . $_GET['error'] . "</div><br>";
        ?>

        <form style='text-align:left' method="post" action="">
            <label>Quantity Broken: <input type="number" step="1" min="0" style="width: 53px;" name="quantity_deducted"/></label><br><br>
            <label>Reason:<br> <textarea rows="5" cols="50" name="rma"></textarea></label><br><br>
            <input type="submit" name="action" class="btn btn-success" value="File RMA" />
        </form>

        <?php
        echo "<br><br><div class='homepageLink'><h4><a href='" . BASE . "/Printer/index' class='btn btn-light'>&#8592 Go Back to Printer Stock</a></h4></div>";
        ?>

    </body>
</html>