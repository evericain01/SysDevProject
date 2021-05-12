<html>
    <head>
        <link rel="stylesheet" href="<?= BASE ?>/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= BASE ?>/css/style.css" type="text/css">
        <title>Add Toner</title>
    </head>

    <body>

        <h2>Adding New Toner:</h2><br><br>
        <form style='text-align:left' method="post" action="">
            <label>Toner Brand: <input type="text" name="brand"/></label><br><br>
            <label>Toner Model: <input type="text" name="model"/></label><br><br>
            <label>Toner Quantity: <input type="number" step="1" min="0" style="width: 53px;" name="quantity"/></label><br><br>
            <input type="submit" name="action" class="btn btn-success" value="Add Toner" />
        </form>

        <?php
        echo "<br><br><div class='homepageLink'><h4><a href='" . BASE . "/Toner/index' class='btn btn-light'>&#8592 Go Back to Toner Stock</a></h4></div>";
        ?>

    </body>
</html>