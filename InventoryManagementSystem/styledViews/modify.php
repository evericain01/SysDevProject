<!DOCTYPE html>
<html>
<title>Modify Profile</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="modify.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script type="text/javascript" src="home.js"></script>
<body>
  <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
    <button class="w3-bar-item w3-button w3-large" onclick="w3_close()">Close &times;</button>
    <a href="home.html" class="w3-bar-item w3-button">Home</a>
    <a href="register.html" class="w3-bar-item w3-button">Register an Account</a>
    <a href="account.html" class="w3-bar-item w3-button">View All Accounts</a>
    <a href="printer.html" class="w3-bar-item w3-button">View Printer Stock</a>
    <a href="toner.html" class="w3-bar-item w3-button">View Toner Stock</a>
  </div>

  <div class="w3-teal">
    <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
    <a href="login.html" class="logout">Log Out</a>
    <a class="language" onclick="modify.php">EN/FR</a>
  </div>

  <form action="" method="POST">
      <label class="username">New Username:</label>
      <input class="inputbox1" type="text" name="username">
      <br>
      
      <label class="fname">First Name:</label>
      <input class="inputbox2" type="test" name="fname">
      <br>

      <label class="lname">Last Name:</label>
      <input class="inputbox3" type="text" name="lname">
      <br>

      <label class="email">New Email:</label>
      <input class="inputbox4" type="text" name="email">
      <br>

      <label class="password">New Password:</label>
      <input class="inputbox5" type="password" name="password">
      <br>

      <label class="password2">Re-Type Password:</label>
      <input class="inputbox6" type="password" name="password2">
      <br>

      <button class="button" type="button" onclick="modify.php">Submit Changes</button>
    </form>
</body>
</html>