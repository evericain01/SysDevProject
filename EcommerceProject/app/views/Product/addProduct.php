<html>
    <head>
        <link rel="stylesheet" href="<?= BASE ?>/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= BASE ?>/css/style.css" type="text/css">
        <title><?= _("Add Product") ?></title>
    </head>
    <body>
        <h3><?= _("Add Product") ?>(s)</h3><br><br>
        <style>
    </style>
    <form action="" method="post" enctype="multipart/form-data">
        <label><?= _("Name") ?>:<br> <input type="text" name="caption" /></label><br /><br>
        <label><?= _("Description") ?>: <br>
            <textarea name="description"><?= $data['product']->description ?></textarea>
        </label><br><br>
        <label><?= _("Stock") ?>: <input type="number" step="1" min="0" name="quantity" /></label><br />
        <label><?= _("Price") ?>: <input type="number" step="1" min="0" name="price" /></label><br /><br>
        <label><?= _("Select the product's image") ?>:<br>&emsp;&emsp;&emsp;&emsp;&emsp;<input type= "file" name="myImage" /></label><br> <br>
        <button type="submit" name="action" class="btn btn-success"> <?= _("Submit") ?></button>
    </form>
    <a href="<?= BASE ?>/Seller/index"><?= _("Cancel") ?></a>
</body>
</html>