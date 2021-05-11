<html>
    <head>
        <link rel="stylesheet" href="<?= BASE ?>/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= BASE ?>/css/style.css" type="text/css">
        <title>Modify Account</title>
    </head>
    <body>
        <h3>Modify Your Manager Account:</h3><br><br>

        <form style='text-align:left' method="post" action="">
            <label>New Username: <input type="text" name="username" value="<?= $data['user']->username ?>"/></label><br>
            <label>New First Name: <input type="text" name="first_name" value="<?= $data['manager']->first_name ?>"/></label><br>
            <label>New Last Name: <input type="text" name="last_name" value="<?= $data['manager']->last_name ?>"/></label><br>
            <label>New Email: <input type="text" name="email" value="<?= $data['manager']->email ?>"/></label><br>
            <label>New Phone Number: <input type="text" name="phone_No" value="<?= $data['manager']->phone_No ?>"/></label><br><br>

            <label>Old Password: <input type="password" name="oldPassword"/></label><br>
            <label>New Password: <input type="password" name="newPassword"/></label><br>
            <label>Re-Type Password: <input type="password" name="reTypePassword"/></label><br><br><br>

            <input type="submit" name="action" class="btn btn-success" value="Submit Changes" />
        </form>
        <a style='font-size:25px' href="<?= BASE ?>/Manager/index">Cancel</a>
    </body>
</html>