<html>
    <head>
        <link rel="stylesheet" href="<?= BASE ?>/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= BASE ?>/css/style.css" type="text/css">
        <title>Create Profile</title>
    </head>
    <body>

        <h3>Create Profile:</h3><br><br>

        <form method="post" action="">
            <label>First Name:<br> <input type="text" name="first_name" placeholder="First Name"/></label><br /> <br>
            <label>Last Name:<br> <input type="text" name="last_name" placeholder="Last Name"/></label><br /> <br>
            <label>Email:<br> <input type="text" name="email" placeholder="Email"/></label><br /> <br>
            <label>Phone Number:<br> <input type="text" name="phone_No" placeholder="Phone Number"/></label><br /> <br>
            
            <input type="submit" name="action" class="btn btn-success" value="Create" />

        </form>
    </body>
</html>
