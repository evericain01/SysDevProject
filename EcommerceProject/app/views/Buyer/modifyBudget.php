<html>
    <head>
        <link rel="stylesheet" href="<?= BASE ?>/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= BASE ?>/css/style.css" type="text/css">
        <title><?= _("Update Wallet") ?></title>
    </head>
    <body>        
        <h2><?= _("Update Your Wallet") ?>:</h2><br>
        <form method="post" action="">
            <label><?= _("Wallet") ?>:<br><input type="number" step="1" min="0" name="budget" 
                                                 value="<?= $data->budget ?>"/></label><br /><br>
            <input type="submit" name="action" class="btn btn-info" value="<?= _("Submit changes") ?>" />

        </form>
        <a href="<?= BASE ?>/Buyer/index" ><?= _("Cancel") ?></a>
    </body>
</html>