<html>
    <head>
        <link rel="stylesheet" href="<?= BASE ?>/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= BASE ?>/css/style.css" type="text/css">
        <title>All RMAs</title>
    </head>
    <body>
        <?php
        echo "<h3>All RMA'd Products</h3><br><br>";

        echo "<div style='text-align:left;'><i>(*Sorted by most recent RMA reports)</i></div><br><br>";
        echo "<div style='text-align:left;'>";

        // using the array_reverse function to sort by date.
        foreach (array_reverse($data['rmas']) as $rma) {
            if ($rma->printer_id != null) {
                foreach (array_reverse($data['printers']) as $printer) {
                    if ($rma->printer_id == $printer->printer_id) {
                        echo "<div style='max-width: 300px;'>";
                        echo "<b>Brand:</b> $printer->printer_brand<br>";
                        echo "<b>Model:</b> $printer->printer_model<br><br>";
                        echo "<b>Reason:</b> $rma->rma_reason<br><br>";
                        echo "<b>RMA Quantity:</b> $rma->rma_quantity<br>";
                        echo "<b>Date: </b><i>$rma->date</i><br>";
                        if ($_SESSION['user_role'] == 'Manager') {
                            echo "<a href='" . BASE . "/RMA/delete/$rma->rma_id' style='padding: 2px 2px; margin-top: 5px;' class='btn btn-danger'>REMOVE RMA</a><br>";
                        }
                        echo "</div>";
                        echo "<hr style='width:325px;background-color:black;text-align:left;margin-left:0'>";
                    }
                }
            } else {
                foreach (array_reverse($data['toners']) as $toner) {
                    if ($rma->toner_id == $toner->toner_id) {
                        echo "<div style='max-width: 300px;'>";
                        echo "<b>Brand:</b> $toner->toner_brand<br>";
                        echo "<b>Model:</b> $toner->toner_model<br><br>";
                        echo "<b>Reason:</b> $rma->rma_reason<br><br>";
                        echo "<b>RMA Quantity:</b> $rma->rma_quantity<br>";
                        echo "<b>Date: </b><i>$rma->date</i><br>";
                        if ($_SESSION['user_role'] == 'Manager') {
                            echo "<a href='" . BASE . "/RMA/delete/$rma->rma_id' style='padding: 2px 2px; margin-top: 5px;' class='btn btn-danger'>REMOVE RMA</a><br>";
                        }
                        echo "</div>";
                        echo "<hr style='width:325px;background-color:black;text-align:left;margin-left:0'>";
                    }
                }
            }
        }
        echo "</div>";

        if ($_SESSION['user_role'] == 'Manager') {
            echo "<br><br><div class='homepageLink'><h4><a href='" . BASE . "/Manager/index' class='btn btn-light'>&#8592 Go Back to Main Page</a></h4></div>";
        } else {
            echo "<br><br><div class='homepageLink'><h4><a href='" . BASE . "/Employee/index' class='btn btn-light'>&#8592 Go Back to Main Page</a></h4></div>";
        }
        ?>
    </body>
</html>