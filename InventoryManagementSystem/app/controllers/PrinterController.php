<?php

namespace App\controllers;

class PrinterController extends \App\core\Controller {

    function index() {
        
    }

    function add() {
        if (isset($_POST["action"])) {
            $printer = new \App\models\Printer();

            $printer->printer_model = $_POST["printer_model"];
            $printer->printer_brand = $_POST["printer_brand"];
            $printer->quantity = 1;

            $printer->rma_status = 'unchecked';
            
            $printer->insert();
            header("location:" . BASE . "/Printer/index");
        } else {
            $this->view('Printer/viewPrinterStock');
        }
    }

    function update($printer_id) {
        if (isset($_POST["action"])) {
            $printer = new \App\models\Printer();
            $printer = $printer->find($printer_id);

            $printer->quantity = $_POST["quantity"];

            if ($_SESSION['user_role'] == 'Manager') {
                $printer->rma_status = $_POST["rma"];
            } 

            $printer->update();
            header("location:" . BASE . "/Printer/index");
        } else {
            $printer = new \App\models\Printer();
            $printer = $printer->find($printer_id);
            $this->view('Printer/editPrinter', $printer_id);
        }
    }

}

?>