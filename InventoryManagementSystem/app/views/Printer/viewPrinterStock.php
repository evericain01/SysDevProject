<html>
    <head>
        <title>All users</title>
    </head>
    <body>
    <?php
        echo "Printers";
        foreach ($data as $printer) {
            echo "<label>Model: $printer->printer_model</label><br><br>";
            echo "<label>Brand: $printer->printer_brand</label><br><br>";
            echo "<label>Quantity: $printer->quantity</label><br><br>";
            echo "<a href='" . BASE . "/Printer/update/$printer->printer_id'>Edit quantity</a><br>";
        }
        ?>
    </body>
</html>
