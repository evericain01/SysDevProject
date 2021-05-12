<html>
    <head>
        <link rel="stylesheet" href="<?= BASE ?>/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= BASE ?>/css/style.css" type="text/css">
        <title>Manager Main Page</title>
    </head>

    <body>
        <?php
        echo "<a href='" . BASE . "/Default/logout' class='btn btn-light' style='float:right;'>Logout</a>";

        echo "<a href='" . BASE . "/Default/editManagerAccount/$data->manager_id' class='btn btn-info' style='display:inline; float:left;'>Modify Your Account</a><br><br>";

        echo "<a href='" . BASE . "/Manager/viewAllUsers' class='btn btn-primary' style='display:inline; float:left;'>View All Accounts </a> ";

        echo "<a href='" . BASE . "/Default/register/$data->manager_id' class='btn btn-primary' style='display:inline; margin-left:10px; float:left;'>Register An Account</a><br><br><br><br><br><br><br>";

        echo "<div class='homePageTitle'>Welcome, " . $data->first_name . " " . $data->last_name . "! <b>[MANAGER]</b></div><br><br><br><br>";

        echo "<div style='border-style: solid; border-width: thin; display: inline-block; width: 40%;'>You are now logged into your local inventory management
                system. You will be able add and delete any desired product
                as well as view all the current stock and changes.</div><br><br><br>";

        echo "<div><a href='" . BASE . "/Printer/index' style='font-size: 25px;'>View Printer Stock</a><br><br></div>";
        echo "<div><a href='" . BASE . "/Toner/index' style='font-size: 25px;'>View Toner Stock</a><br><br></div>";
        echo "<div><a href='" . BASE . "/RMA/index' style='font-size: 25px;'>View RMA'd Products</a><br><br></div>";

        echo "<hr style='width:100%;text-align:left;margin-left:0'>";
        ?>
    </body>
</html>

