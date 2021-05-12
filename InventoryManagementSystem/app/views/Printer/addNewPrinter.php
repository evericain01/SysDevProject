<html>
    <head>
        <link rel="stylesheet" href="<?= BASE ?>/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= BASE ?>/css/style.css" type="text/css">
        <title>Add Printer</title>
    </head>

    <body>

        <h2>Adding New Printer:</h2><br><br>
        <form style='text-align:left' method="post" action="">
            <label>Printer Brand: <input type="text" name="brand"/></label><br><br>
            <label>Printer Model: <input type="text" name="model"/></label><br><br>
            <label>Printer Quantity: <input type="number" step="1" min="0" style="width: 53px;" name="quantity"/></label><br><br>
            <input type="submit" name="action" class="btn btn-success" value="Add Printer" />
        </form>

        <?php
        echo "<br><br><div class='homepageLink'><h4><a href='" . BASE . "/Printer/index' class='btn btn-light'>&#8592 Go Back to Printer Stock</a></h4></div>";
        ?>

    </body>
</html>