<html>
    <head>
        <link rel="stylesheet" href="<?= BASE ?>/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= BASE ?>/css/style.css" type="text/css">
        <title>Toner Stock</title>
    </head>
    <body>

        <h1>Toner Inventory</h1>

        <?php
        echo "<form action='' method='post'>";
        echo "<a href='" . BASE . "/StockHistory/index' style='font-size:17px'>[View Toner Stock History]</a>&nbsp&nbsp&nbsp<br><br><br>";
        echo "<input type='text' id='keyword' placeholder='Search Toners' name='keyword'></br>";

        // Loop for adding spaces to line up both hyperlinks. Remove if you know a better way.
        for ($count = 0; $count < 56; $count++) {
            echo "&nbsp";
        }
        echo "</br>
            <select name='filter' id='filter'>
                <option disabled selected>Filter By</option>
                <option value='brand'> Toner Brand </option>
                <option value='model'> Toner Model </option>
            </select>
            <select name='sort' id='sort'>
                <option disabled selected>Sort By</option>
                <option value='nameAsc'> Name Ascending</option>
                <option value='nameDesc'> Name Descending </option>
                <option value='stockAsc'> Quantity Ascending</option>
                <option value='stockDesc'> Quantity Descending </option>
            </select>
        <input type='submit' name='action' class='btn btn-primary' style='padding: 4px 4px;' value='Apply' />
        </form>";

        echo "<br><h4 style='text-align:left'><a href='" . BASE . "/Toner/add' class='btn btn-success'>Add A New Toner</a></h4><br>";

        echo "<div style='text-align:left'>";
        echo "<b><u><h4>Toners:</h4></u></b><br>";

        $count = 1;
        foreach ($data as $toner) {
            echo "<div style='border-style: ridge; width: 600px; margin-top:5px; margin-bottom:5px; padding-top:5px; padding-bottom:5px;'>";
            echo "&nbsp $count. <b>$toner->toner_brand</b> $toner->toner_model (<u>Quantity: $toner->quantity</u>)
                <div style='text-align:right;'><a href='" . BASE . "/Toner/update/$toner->toner_id' class='btn btn-info' style='padding: 2px 2px;'>Edit Quantity</a> ";
            if ($_SESSION['user_role'] == 'Manager') {
                echo "&#124; <a href='" . BASE . "/RMA/rmaToner/$toner->toner_id' class='btn btn-warning' style='padding: 2px 2px;'>File RMA</a>";
            }
            echo "</div>";
            echo "</div>";
            $count++;
        }

        if ($_SESSION['user_role'] == 'Manager') {
            echo "<br><br><div class='homepageLink'><h4><a href='" . BASE . "/Manager/index' class='btn btn-light'>&#8592 Go Back to Main Page</a></h4></div>";
        } else {
            echo "<br><br><div class='homepageLink'><h4><a href='" . BASE . "/Employee/index' class='btn btn-light'>&#8592 Go Back to Main Page</a></h4></div>";
        }
        echo "</div>"
        ?>
    </body>
</html>

