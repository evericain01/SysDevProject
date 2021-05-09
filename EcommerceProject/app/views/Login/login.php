<html>
    <head>
        <title><?= _("Log into an account") ?></title>

        <link rel="stylesheet" href="<?= BASE ?>/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= BASE ?>/css/style.css" type="text/css">

    </head>
    <body>
        <?php
        if (isset($_GET['error']))
            echo $_GET['error'];
        ?>

        <h1><?= _("Electronics Marketplace") ?></h1><br><br><br><br>
        <form method="post" action="">
            <label><?= _("Username") ?>: <br><input type="text" name="username" placeholder="<?= _("Username") ?>" /></label><br /><br>
            <label><?= _("Password") ?>: <br><input type="password" name="password" placeholder="<?= _("Password") ?>" /></label><br /><br>

            <button type="submit" name="action" value="Login" class="btn btn-success"><?= _("Login") ?></button><br><br>

            <a href='?lang=en'><?= _("English") ?></a> &#124;
            <a href='?lang=fr'><?= _("French") ?></a> <br /><br>

        </form>
        <a href="<?= BASE ?>/Default/register" class="btn btn-warning"><?= _("Register Here") ?>!</a>
    </body>
</html>