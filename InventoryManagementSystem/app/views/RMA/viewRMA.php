<html>
<head>
    <title>All RMA</title>
</head>
<body>
<?php
    foreach ($data['rma'] as $rma) {
        if($rma->printer_id != null) {
            foreach($data['printers'] as $printer) {
                if($rma->printer_id == $printer->printer_id) {
                    echo "<label>First name: $printer->printer_model</label><br><br>";
                    echo "<label>Last name: $printer->printer_brand</label><br><br>";
                    echo "<label>Reason: $rma->rma_reason</label><br><br>";
                    echo "<a href='" . BASE . "/RMA/delete/$rma->rma_id'>Demote</a><br>";
                }
            }
        }
        else {
            foreach($data['toners'] as $toner) {
                if($rma->toner_id == $toner->toner_id) {
                    echo "<label>First name: $toner->toner_model</label><br><br>";
                    echo "<label>Last name: $toner->toner_brand</label><br><br>";
                    echo "<label>Reason: $rma->rma_reason</label><br><br>";
                    echo "<a href='" . BASE . "/RMA/delete/$rma->rma_id'>Demote</a><br>";
                }
            }
        }
    }
    ?>
</body>
</html>