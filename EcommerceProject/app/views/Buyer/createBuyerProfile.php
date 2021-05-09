<html>
    <head>
        <link rel="stylesheet" href="<?= BASE ?>/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= BASE ?>/css/style.css" type="text/css">
        <title><?= _("Create Buyer Profile") ?></title>
    </head>
    <body>

        <h3><?= _("Create Your Buyer Profile") ?>:</h3><br><br>

        <form method="post" action="">
            <label><?= _("First Name") ?>:<br> <input type="text" name="first_name" placeholder="First Name"/></label><br /> <br>
            <label><?= _("Last Name") ?>:<br> <input type="text" name="last_name" placeholder="Last Name"/></label><br /> <br>
            <label><?= _("Wallet") ?>:<br> <input type="number" step="1" name="budget" min="0" placeholder="Budget"/></label><br /> <br>

            <input type="submit" name="action" class="btn btn-success" value="<?= _("Submit changes") ?>" />

        </form>

    </body>
</html>