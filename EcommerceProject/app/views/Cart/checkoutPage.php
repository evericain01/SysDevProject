<html>
        <link rel="stylesheet" href="<?= BASE ?>/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE ?>/css/style.css" type="text/css">
    <head><title>Confirmation Page")?></title>
    </head>
    <body>
        <h1><?= _("Confirm Payment") ?>?</h1>

        <?php
        $buyer_id = $data['buyer']->buyer_id;
        echo "<br><h2><b><a href='" . BASE . "/Cart/checkout/$buyer_id' class='btn btn-outline-success'>" . _("YES") . "!</a></b></h2>";
        echo "<h2><b><a href='" . BASE . "/Cart/index' class='btn btn-outline-danger'>" . _("NO") . ".</a></b></h3>";
        ?>

    </body>
</html>
