<!-- <html>
    <head>
        <title>Register an account</title>
    </head>
    <body>
        <?php
        if (isset($_GET['error'])) {
            echo $_GET['error'];
        }
        ?>
        <form method="post" action="">
            <label>Username: <input type="text" name="username" /></label><br />
            <label>Password: <input type="password" name="password" /></label><br />
            <label>Password confirmation: <input type="password" name="password_confirm" /></label><br />

            <input type="submit" name="action" value="Register" />

        </form>
        <a href="<?= BASE ?>/Default/login">Already have an account? Login.</a>
    </body>
</html> -->

<!DOCTYPE html>
<html>
<title>Register</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="register.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script type="text/javascript" src="home.js"></script>
<body>
  <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
    <button class="w3-bar-item w3-button w3-large" onclick="w3_close()">Close &times;</button>
    <a href="home.html" class="w3-bar-item w3-button">Home</a>
    <a href="modify.html" class="w3-bar-item w3-button">Modify Profile</a>
    <a href="account.html" class="w3-bar-item w3-button">View All Accounts</a>
    <a href="printer.html" class="w3-bar-item w3-button">View Printer Stock</a>
    <a href="toner.html" class="w3-bar-item w3-button">View Toner Stock</a>
  </div>

  <div class="w3-teal">
    <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
    <a href="login.html" class="logout">Log Out</a>
    <a class="language" onclick="register.php">EN/FR</a>
  </div>

  <form action="" method="POST">
      <label class="username">Username:</label>
      <input class="inputbox1" type="text" name="username">
      <br>

      <label class="password">Password:</label>
      <input class="inputbox5" type="password" name="password">
      <br>

      <label class="password2">Re-Type Password:</label>
      <input class="inputbox6" type="password" name="password_confirm">
      <br>

      <button class="button" type="button" onclick="register.php">Register Account</button>
    </form>
</body>
</html>