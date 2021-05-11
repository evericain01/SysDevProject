<html>
    <head>
        <link rel="stylesheet" href="<?= BASE ?>/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= BASE ?>/css/style.css" type="text/css">
        <title>Register an account</title>
    </head>

    <body>
        <?php
        if (isset($_GET['error']))
            echo $_GET['error'];
        ?>

        <h1>Register an Account:</h1><br><br>

        <form style='text-align:left' method="post" action="">
            <label>Username: <input type="text" name="username" placeholder="Username" /></label><br />
            <label>First Name: <input type="text" name="first_name" placeholder="First Name"/></label><br /> 
            <label>Last Name: <input type="text" name="last_name" placeholder="Last Name"/></label><br /> 
            <label>Email: <input type="text" name="email" placeholder="Email"/></label><br />
            <label>Phone Number: <input type="text" name="phone_No" placeholder="Phone Number"/></label><br /> <br>
            <label>Password: <input type="password" name="password" placeholder="Password" /></label><br />
            <label>Password Confirmation: <input type="password" name="password_confirm" placeholder="Re-type Password"/></label><br /><br>

            <input type="submit" name="action" class="btn btn-success" value="Create Employee Account" />

        </form>

        <a style='font-size:25px' href="<?= BASE ?>/Manager/index">Cancel</a>
    </body>
</html>