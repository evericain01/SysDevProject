<html>
    <head>
        <title>Toner Stock</title>
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
        foreach ($data as $toner) {
            echo "<label>Model: $toner->toner_model</label><br><br>";
            echo "<label>Brand: $toner->toner_brand</label><br><br>";
            echo "<label>Quantity: $toner->quantity</label><br><br>";
            echo "<a href='" . BASE . "/Toner/update/$toner->toner_id'>Edit quantity</a><br>";
        }
        ?>
    </body>
</html>
