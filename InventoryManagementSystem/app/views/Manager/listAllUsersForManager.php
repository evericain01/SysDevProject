<html>
    <head>
        <link rel="stylesheet" href="<?= BASE ?>/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= BASE ?>/css/style.css" type="text/css">
        <title>All users</title>
    </head>
    <body>

        <h2>All Accounts</h2><br><br>

        <?php
        echo "<div style='text-align:left'>";
        echo "<b><u><h5>MANAGERS:</h5></u></b><br>";
        foreach ($data['users'] as $user) {
            foreach ($data['managers'] as $manager) {
                if ($user->user_id == $manager->user_id) {
                    echo "<b>Name: </b>" . $manager->first_name . " " . $manager->last_name . " ($user->username)<br>";
                    echo "<b>Email:</b> $manager->email<br>";
                    echo "<b>Phone Number:</b> $manager->phone_No<br>";
                    echo "<a href='" . BASE . "/Manager/demote/$manager->manager_id' class='btn btn-warning' style='padding: 3px 3px; font-size:13px'>DEMOTE TO EMPLOYEE</a> ";
                    echo "<a href='" . BASE . "/Manager/deleteManager/$manager->manager_id' class='btn btn-danger' style='padding: 3px 3px; font-size:13px'>DELETE ACCOUNT</a><br><br> ";
                    echo "<hr style='width:325px;text-align:left;margin-left:0'>";
                }
            }
        }

        echo "<br><br><br>";

        echo "<b><u><h5>EMPLOYEES:</h5></u></b><br>";
        foreach ($data['users'] as $user) {
            foreach ($data['employees'] as $employee) {
                if ($user->user_id == $employee->user_id) {
                    echo "<b>Name:</b> " . $employee->first_name . " " . $employee->last_name . " ($user->username)<br>";
                    echo "<b>Email:</b> $employee->email<br>";
                    echo "<b>Phone Number:</b> $employee->phone_No<br>";
                    echo "<a href='" . BASE . "/Manager/promote/$employee->employee_id' class='btn btn-primary' style='padding: 3px 3px; font-size:13px'>PROMOTE TO MANAGER</a> ";
                    echo "<a href='" . BASE . "/Manager/deleteEmployee/$employee->employee_id' class='btn btn-danger' style='padding: 3px 3px; font-size:13px'>DELETE ACCOUNT</a><br><br> ";
                    echo "<hr style='width:325px;text-align:left;margin-left:0'>";
                }
            }
        }

        echo "<br><br><br><br><div class='homepageLink'><h4><a href='" . BASE . "/Manager/index' class='btn btn-light'>&#8592 Go Back to Main Page</a></h4></div>";
        echo "</div>"
        ?>
    </body>
</html>