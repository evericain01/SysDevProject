<html>
<head>
    <title>All RMA</title>
</head>
<body>
    <?php
        echo "<label>First name: ". $data['printer']->printer_model ."</label><br><br>";
        echo "<label>Last name: ". $data['printer']->printer_brand ."</label><br><br>";
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
        <label><Quantity:<br><input type="textarea" name="reason" /></label><br /><br>
        <input type="submit" name="action" class="btn btn-info" value="Add rma" />
    </form>
</body>
</html>