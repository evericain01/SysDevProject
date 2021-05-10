<html>
    <head>
        <title>Printer Stock</title>
    </head>
    <body>
        <select name="sort">
            <option value="">  </option>
            <option value="name ascending"> Name </option>
            <option value="name descending"> Name descending </option>
            <option value="stock ascending"> Stock </option>
            <option value="stock descdending"> Stock descending </option>
        </select> <br><br>
        <input type="submit" name="action" value="Sort" />


        <br><br>
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
