<html>
    <head>
        <link rel="stylesheet" href="<?= BASE ?>/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= BASE ?>/css/style.css" type="text/css">
        <title>Modify Profile</title>
    </head>
    <body>
        <h3>Modify Your Employee Profile:</h3><br><br>
        <br>
        <form method="post" action="">
            <label>New First Name:<br> <input type="text" name="first_name" value="<?= $data->first_name ?>"/></label><br><br>
            <label>New Last Name:<br> <input type="text" name="last_name" value="<?= $data->last_name ?>"/></label><br><br>
            <label>New Email:<br> <input type="text" name="email" value="<?= $data->email ?>"/></label><br><br><br>
            <label>New Phone Number:<br> <input type="text" name="phone_No" value="<?= $data->phone_No ?>"/></label><br><br><br>
            <input type="submit" name="action" class="btn btn-success" value="Submit Changes" />
        </form>
        <a href="<?= BASE ?>/Employee/index">Cancel</a>
    </body>
</html>