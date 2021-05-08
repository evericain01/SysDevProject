<html>
    <head>
        <title>All users</title>
    </head>
    <body>
    <?php
        echo "Managers";
        foreach ($data['managers'] as $manager) {
            echo "<label>First name: $manager->first_name</label><br><br>";
            echo "<label>Last name: $manager->last_name</label><br><br>";
            echo "<label>Email: $manager->email</label><br><br>";
            echo "<label>Phone number: $manager->phone_No</label><br><br>";
            echo "<a href='" . BASE . "/Manager/demote/$manager->manager_id'>Demote</a><br>";
        }

        echo "Employees";
        foreach ($data['employees'] as $employee) {
            echo "<label>First name: $employee->first_name</label><br><br>";
            echo "<label>Last name: $employee->last_name</label><br><br>";
            echo "<label>Email: $employee->email</label><br><br>";
            echo "<label>Phone number: $employee->phone_No</label><br><br>";
            echo "<a href='" . BASE . "/Manager/promote/$employee->employee_id'>Promote</a><br>";
        } 
        ?>
    </body>
</html>