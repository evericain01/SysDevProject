<html>
    <head>
        <link rel="stylesheet" href="<?= BASE ?>/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= BASE ?>/css/style.css" type="text/css">
        <title>History</title>
    </head>
    <body>
        <h2>Stock History Changes [Toners]</h2><br><br>

        <?php
        echo "<div style='text-align:left;'><i>(*Sorted by most recent changes)</i></div><br><br>";
        echo "<div style='text-align:left;'>";
        echo "<b><u><h4>Toner Changes:</h4></u></b><br>";
        echo "<hr style='width:325px;text-align:left;background-color:black;margin-left:0'>";
        foreach (array_reverse($data['changes']) as $change) {
            foreach ($data['users'] as $user) {
                if ($change->user_id == $user->user_id) {
                    foreach ($data['toners'] as $toner) {
                        if ($change->toner_id == $toner->toner_id) {
                            echo "<b>Toner model:</b> $toner->toner_model<br>";
                            echo "<b>Toner brand:</b> $toner->toner_brand<br><br>";
                            echo "<mark style='background-color: yellow;'>$change->type_of_change</mark><br><br>";
                            echo "<b>Name: </b>" . $change->worker_name . ' (' . $user->username . ')' . "<br>";
                            echo "<b style='color:red;'>Date of Change:</b> $change->date<br>";
                            echo "<hr style='width:325px;text-align:left;background-color:black;margin-left:0'>";
                        }
                    }
                }
            }
        }

        if ($_SESSION['user_role'] == 'Manager') {
            echo "<br><br><div class='homepageLink'><h4><a href='" . BASE . "/Toner/index' class='btn btn-light'>&#8592 Go Back to Toner Stock</a></h4></div>";
        } else {
            echo "<br><br><div class='homepageLink'><h4><a href='" . BASE . "/Toner/index' class='btn btn-light'>&#8592 Go Back to Toner Stock</a></h4></div>";
        }
        echo "</div>";
        ?>
    </body>
</html>