<html>
    <head>
        <link rel="stylesheet" href="<?= BASE ?>/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= BASE ?>/css/style.css" type="text/css">
        <title>All users</title>
    </head>
    <body>

        <h2>All Users</h2><br><br>

        <?php
        echo "<div style='text-align:left'>";
        echo "<b><u><h5>MANAGERS:</h5></u></b><br>";
        foreach ($data['users'] as $user) {
            foreach ($data['managers'] as $manager) {
                if ($user->user_id == $manager->user_id) {
                    echo "<b>Name: </b>" . $manager->first_name . " " . $manager->last_name . " ($user->username)<br>";
                    echo "<b>Email:</b> $manager->email<br>";
                    echo "<b>Phone Number:</b> $manager->phone_No<br>";
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
                    echo "<hr style='width:325px;text-align:left;margin-left:0'>";
                }
            }
        }

        echo "<br><br><div class='homepageLink'><h4><a href='" . BASE . "/Employee/index' class='btn btn-light'>&#8592 Go Back to Main Page</a></h4></div>";
        echo "</div>"
        ?>
    </body>
</html>

