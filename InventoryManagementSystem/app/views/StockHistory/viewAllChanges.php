<html>
    <head>
        <link rel="stylesheet" href="<?= BASE ?>/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= BASE ?>/css/style.css" type="text/css">
        <title>History</title>
    </head>
    <body>

        <h2>All changes</h2><br><br>

        <?php
        echo "<div style='text-align:left'>";
        echo "<b><u><h5>Printer Changes:</h5></u></b><br>";
        foreach ($data['changes'] as $change) {
            foreach ($data['users'] as $user) {
                if ($change->user_id == $user->user_id) {
                    foreach ($data['printers'] as $printer) {
                        if($change->printer_id == $printer->printer_id) {
                            echo "<b>Username: </b>" . $user->username . "<br>";
                            echo "<b>Printer model:</b> $printer->printer_model<br>";
                            echo "<b>Printer brand:</b> $printer->printer_brand<br>";
                            echo "<b>Timestamp of change:</b> $change->date<br>";
                            echo "<hr style='width:325px;text-align:left;margin-left:0'>";
                        }
                    }
                }
            }
        }

        echo "<div style='text-align:left'>";
        echo "<b><u><h5>Toner Changes:</h5></u></b><br>";
        foreach ($data['changes'] as $change) {
            foreach ($data['users'] as $user) {
                if ($change->user_id == $user->user_id) {
                    foreach ($data['toners'] as $toner) {
                        if($change->toner_id == $toner->toner_id) {
                            echo "<b>Username: </b>" . $user->username;
                            echo "<b>Toner model:</b> $toner->toner_model<br>";
                            echo "<b>Toner brand:</b> $toner->toner_brand<br>";
                            echo "<b>Timestamp of change:</b> $change->date<br>";
                            echo "<hr style='width:325px;text-align:left;margin-left:0'>";
                        }
                    }
                }
            }
        }

        
        if ($_SESSION['user_role'] == 'Manager') {
        echo "<br><br><div class='homepageLink'><h4><a href='" . BASE . "/Manager/index' class='btn btn-light'>&#8592 Go Back to Main Page</a></h4></div>";
        }else {
            echo "<br><br><div class='homepageLink'><h4><a href='" . BASE . "/Employee/index' class='btn btn-light'>&#8592 Go Back to Main Page</a></h4></div>";
        }
        echo "</div>"
        ?>
    </body>
</html>