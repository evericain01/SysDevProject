<html>
    <head>
        <link rel="stylesheet" href="<?= BASE ?>/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= BASE ?>/css/style.css" type="text/css">
        <title>Employee Main Page</title>
    </head>

    <body>
        <?php
        echo "<a href='" . BASE . "/Default/logout' class='btn btn-light' style='float:right;'>Logout</a>";

        echo "<a href='" . BASE . "/Employee/edit/$data->employee_id' class='btn btn-primary' style='display:inline; float:left;'>Modify Your Account</a><br><br>";

        echo "<a href='" . BASE . "/Employee/listAllUsersForEmployee' class='btn btn-primary' style='display:inline; float:left;'>View all Accounts</a><br><br>";

        echo "<div class='homePageTitle'>Welcome, " . $data->first_name . " " . $data->last_name . "! <b>[EMPLOYEE]</b></div><br><br><br><br>";

        echo "<h5 style='border-style: solid;'>You are now logged into your local inventory management
                system. You will be able add and delete any desired product
                as well as view all the current stock and changes.</h5><br><br><br>";

        echo "<div><a href='" . BASE . "/Printer/index' style='font-size: 25px;'>View Printer Stock</a><br><br></div>";
        echo "<div><a href='" . BASE . "/Toner/index' style='font-size: 25px;'>View Toner Stock</a><br><br></div>";
        
        echo "<hr style='width:100%;text-align:left;margin-left:0'>";
        ?>
    </body>
</html>

