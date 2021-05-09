<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="<?= BASE ?>/login.css" type="text/css">
    </head>
    <body>
        <?php
        if (isset($_GET['error']))
            echo $_GET['error'];
        ?>
        <h2 class="language" onclick="login.php">EN/FR</h2>
        <h1 class="title">Login</h1>
        <form action="" method="POST">
            <label class="username">Enter Username:</label>
            <input class="inputbox1" type="text" name="username">
            <br>

            <label class="password">Enter Password:</label>
            <input class="inputbox2" type="password" name="password">
            <br>
            
            <button class="button" type="submit">Sign In</button>
        </form>
    </body>
</html>