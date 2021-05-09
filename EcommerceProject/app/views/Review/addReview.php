<html>
    <head>
        <link rel="stylesheet" href="<?= BASE ?>/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= BASE ?>/css/style.css" type="text/css">
        <title><?= _("Add Review") ?></title>
    </head>
    <body>
        <h2><?= _("Adding a Review") ?></h2><br><br>
        <form action="" method="post" enctype="multipart/form-data">

            <label><?= _("Rate") ?>:</label>
            <select name="rate" value= "">
                <option value="1">1/5</option>
                <option value="2">2/5</option>
                <option value="3">3/5</option>
                <option value="4">4/5</option>
                <option value="5">5/5</option>
            </select> <br><br>

            <label><?= _("Write a Review") ?>: <br>
                <textarea name="text_review" value = ""></textarea>
            </label><br><br>

            <button type="submit" name="action" class="btn btn-success" /><?= _("Submit") ?></button>
        </form>
        <a href="<?= BASE ?>/Order/index"><?= _("Cancel") ?></a>
    </body>
</html>