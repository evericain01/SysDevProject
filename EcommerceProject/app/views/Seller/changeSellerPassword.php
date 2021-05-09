<html>
    <head>
        <link rel="stylesheet" href="<?= BASE ?>/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= BASE ?>/css/style.css" type="text/css">
        <title><?= _("Changing Password") ?></title>
    </head>
    <body>
        <h3><?= _("Changing Password") ?>:</h3><br><br>
        <br>
        <form method="post" action="">
            <label><?= _("Old Password") ?>:<br> <input type="password" name="oldPassword"/></label><br><br>
            <label><?= _("New Password") ?>:<br> <input type="password" name="newPassword"/></label><br><br>
            <label><?= _("ReType Password") ?>:<br> <input type="password" name="reTypePassword"/></label><br><br><br>
        <button type="submit" name="action" class="btn btn-success"> <?= _("Submit changes") ?></button>
        </form>
        <a href="<?= BASE ?>/Seller/index"><?= _("Cancel") ?></a>
    </body>
</html>