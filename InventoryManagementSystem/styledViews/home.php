<!DOCTYPE html>
<html>
<title>Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="home.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script type="text/javascript" src="home.js"></script>
<body>
 <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large" onclick="w3_close()">Close &times;</button>
  <a href="modify.html" class="w3-bar-item w3-button">Modify Profile</a>
  <a href="register.html" class="w3-bar-item w3-button">Register an Account</a>
  <a href="account.html" class="w3-bar-item w3-button">View All Accounts</a>
  <a href="printer.html" class="w3-bar-item w3-button">View Printer Stock</a>
  <a href="toner.html" class="w3-bar-item w3-button">View Toner Stock</a>
  </div>

  <div class="w3-teal">
    <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
    <a href="login.html" class="logout">Log Out</a>
    <a class="language" onclick="home.php">EN/FR</a>
  </div>

  <h1 class="welcome">Welcome back, </h1>
  <div class="message">
    <p class="text">You are currently logged into your local inventory management system. Press on the "≡" icon to modify your profile, register or view an account and view printer/toner stock information.</p>
  </div>
</body>
</html>