<!-- <html>
    <head>
        <title>Log into an account</title>
    </head>
    <body>
        <?php
        if (isset($_GET['error']))
            echo $_GET['error'];
        ?>
        <form method="post" action="">
            <label>Username: <input type="text" name="username" /></label><br />
            <label>Password: <input type="password" name="password" /></label><br />

            <input type="submit" name="action" value="Login" />

        </form>
        <a href="<?= BASE ?>/Default/register">Register Here!</a>
    </body>
</html> -->


<!DOCTYPE html>
<html>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="login.css">
<body>
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