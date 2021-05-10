<html>
    <head>
        <title>Log into an account</title>

        <link rel="stylesheet" href="<?= BASE ?>/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= BASE ?>/css/style.css" type="text/css">

    </head>
    <body>
        <?php
        if (isset($_GET['error']))
            echo $_GET['error'];
        ?>
        
        <h1>Login</h1><br><br><br><br>
        
        <form method="post" action="">
            <label>Username: <br><input type="text" name="username" placeholder="Username" /></label><br /><br>
            <label>Password: <br><input type="password" name="password" placeholder="Password" /></label><br /><br>

            <button type="submit" name="action" value="Login" class="btn btn-success">Login</button><br><br>
        </form>
    </body>
</html>