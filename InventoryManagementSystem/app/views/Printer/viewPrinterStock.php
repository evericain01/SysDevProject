<html>
    <head>
        <link rel="stylesheet" href="<?= BASE ?>/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= BASE ?>/css/style.css" type="text/css">
        <title>Printer Stock</title>
    </head>
    <body>

        <h2>List of Printers</h2><br><br>

        <?php        

        echo "
        </br>
        <form action='' method='post'>";
        echo "<a href=''>View Stock History</a>&nbsp&nbsp&nbsp";
        echo "<input type='text' id='keyword' placeholder='Search printers' name='keyword'></br>";

        // Loop for adding spaces to line up both hyperlinks. Remove if you know a better way.
        for($count = 0; $count < 56; $count++){
            echo "&nbsp";
        }
        echo "</br>
            <select name='sort' id='sort'>
                <option disabled selected>Select sorting</option>
                <option value='nameAsc'> Name ascending</option>
                <option value='nameDesc'> Name descending </option>
                <option value='stockAsc'> Stock ascending</option>
                <option value='stockDesc'> Stock descending </option>
            </select>
            <select name='filter' id='filter'>
                <option disabled selected>Select filter</option>
                <option value='model'> Printer model </option>
                <option value='brand'> Printer brand </option>
                <option value='rma'> RMA </option>
            </select>
        <input type='submit' name='action' value='Apply' />
        </form>";

        echo "<div style='text-align:left'>";
        echo "<b><u><h5>Printers:</h5></u></b><br>";

        $count = 1;
        foreach ($data as $printer) {

            echo "&nbsp
                $count. $printer->printer_brand $printer->printer_model (Quantity: $printer->quantity)
                <a href='".BASE."/Printer/update/$printer->printer_id'>Edit quantity</a>
                </br>
            ";
            $count++;                        
        }

        echo "<br><br><div class='homepageLink'><h4><a href='" . BASE . "/Employee/index' class='btn btn-light'>&#8592 Go Back to Main Page</a></h4></div>";
        echo "</div>"
        ?>
    </body>
</html>

