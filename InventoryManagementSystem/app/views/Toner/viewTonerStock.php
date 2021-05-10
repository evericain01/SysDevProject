<html>
    <head>
        <title>All users</title>
    </head>
    <body>
    <?php
        echo "Printers";
        foreach ($data as $toner) {
            echo "<label>Model: $toner->toner_model</label><br><br>";
            echo "<label>Brand: $toner->toner_brand</label><br><br>";
            echo "<label>Quantity: $toner->quantity</label><br><br>";
            echo "<a href='" . BASE . "/Toner/update/$toner->toner_id'>Edit quantity</a><br>";
        }
        ?>
    </body>
</html>
