<!-- <html>
    <head>
        <title>Register an employee</title>
    </head>
    <body>
        <form method="post" action="">
            <label>First name: <input type="text" name="first_name" /></label><br />
            <label>Last name: <input type="text" name="last_name" /></label><br />
            <label>Email: <input type="text" name="email" /></label><br />
            <label>Phone number: <input type="text" name="phone" /></label><br />

            <input type="submit" name="action" value="Register employee" />

        </form>
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
      
      <label class="fname">First Name:</label>
      <input class="inputbox2" type="test" name="first_name">
      <br>

      <label class="lname">Last Name:</label>
      <input class="inputbox3" type="text" name="last_name">
      <br>

      <label class="email">Email:</label>
      <input class="inputbox4" type="text" name="email">
      <br>

      <label class="phone">Phone:</label>
      <input class="inputbox4" type="text" name="phone">
      <br>

      <button class="button" type="submit">Register Account</button>
    </form>
</body>
</html>