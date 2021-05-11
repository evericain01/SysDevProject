<html>
<head>
    <title>Printer</title>
</head>
<body>
    <?php
        echo "<label>Model:$data->printer_model</label><br><br>";
        echo "<label>Brand:$data->printer_brand</label><br><br>";
    ?>
    <form method="post" action="">
        <label><Quantity:<br><input type="number" step="1" min="0" name="quantity" 
                                             value="<?= $data['printer']->quantity ?>"/></label><br /><br>
        <input type="submit" name="action" class="btn btn-info" value="Submit changes" />
    </form>

    <?php
        echo "Broken?";
    ?>

    <form method="post" action="">
        <label><Quantity:<br><input type="number" step="1" min="0" name="quantity_broken" /></label><br /><br>
        <label><Reason:<br><input type="textarea" name="reason" /></label><br /><br>
        <input type="submit" name="action" class="btn btn-info" value="Add rma" />
    </form>
</body>
</html>