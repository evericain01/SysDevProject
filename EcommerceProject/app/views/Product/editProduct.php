<html>
    <head>
        <link rel="stylesheet" href="<?= BASE ?>/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= BASE ?>/css/style.css" type="text/css">
        <title><?= _("Edit Product") ?></title>
    </head>
    <body>
        <h4><?= _("Editing this Product") ?>:</h4><br><br>
        <form action="" method="post">
            <img src='<?= BASE ?>/uploads/<?= $data->filename ?>' width='150' height='100'/><br><br>
            <label><?= _("Name") ?>: <input type="text" name="caption" size="30" value="<?= $data->caption ?>"/></label><br /> <br />
            <label><?= _("Description") ?>: <br>
                <textarea name="description"><?= $data->description ?></textarea>
            </label><br><br>
            <label><?= _("Stock") ?>: <input type="number" step="1" min="0" name="quantity" value="<?= $data->quantity ?>"/></label><br />
            <label><?= _("Price") ?>: <input type="number" step="1" min="0" name="price" value="<?= $data->price ?>"/></label><br /> <br />
        <button type="submit" name="action" class="btn btn-success"> <?= _("Submit changes") ?></button>
        </form>
        <a href="<?= BASE ?>/Seller/index"><?= _("Cancel") ?></a> 
    </body>
</html>