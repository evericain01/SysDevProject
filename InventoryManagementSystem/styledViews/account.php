<!DOCTYPE html>
<html>
    <head>
        <title>View all accounts</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="account.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <script type="text/javascript" src="home.js"></script>
    </head>
    <body>
        <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
            <button class="w3-bar-item w3-button w3-large" onclick="w3_close()">Close &times;</button>
            <a href="home.html" class="w3-bar-item w3-button">Home</a>
            <a href="modify.html" class="w3-bar-item w3-button">Modify Profile</a>
            <a href="printer.html" class="w3-bar-item w3-button">View Printer Stock</a>
            <a href="toner.html" class="w3-bar-item w3-button">View Toner Stock</a>
        </div>

        <div class="w3-teal">
            <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
            <a href="login.html" class="logout">Log Out</a>
            <a class="language" onclick="account.php">EN/FR</a>
            <input type="text" class="search" placeholder="Click to search...">
            <a class="button" onclick="">Go</a>
        </div>

    <center>
        <div class="window">
            <h1>View All Accounts</h1>

            <div class="paragraph1">
                <h1 class="subtitle">1. peter12 (Peter Vincent) - Employee</h1>  
                <h1 class="text">Email: peter12@outlook.com</h1>
            </div>

            <div class="paragraph2">
                <h1 class="subtitle">2. peter12 (Peter Vincent) - Employee</h1>  
                <h1 class="text">Email: peter12@outlook.com</h1>
            </div>

            <div class="paragraph3">
                <h1 class="subtitle">3. peter12 (Peter Vincent) - Employee</h1>  
                <h1 class="text">Email: peter12@outlook.com</h1>
            </div>

            <div class="paragraph4">
                <h1 class="subtitle">4. peter12 (Peter Vincent) - Employee</h1>  
                <h1 class="text">Email: peter12@outlook.com</h1>
            </div>

            <div class="paragraph5">
                <h1 class="subtitle">5. peter12 (Peter Vincent) - Employee</h1>  
                <h1 class="text">Email: peter12@outlook.com</h1>
            </div>
    </center>
</body>
</html>