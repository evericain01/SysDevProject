<?php

namespace App\controllers;

class PrinterController extends \App\core\Controller {
    function add() {
        if (isset($_POST["action"])) {
            $printer = new \App\models\Printer();
            $printer->printer_model = $_POST["printer_model"];
            $printer->printer_brand = $_POST["printer_brand"];
            $printer->quantity = $_POST["quantity"];
            $printer->rma_status = $_POST["rma"];

            $printer->insert();
            // header("location:" . BASE . "/Manager/index/");
        } else {
            // $this->view('Default/register');
        }
    }

    function update($printer_id) {
        if (isset($_POST["action"])) {
            $printer = new \App\models\Printer();
            $printer = $printer->find($printer_id);

            $printer->quantity = $_POST["quantity"];

            $printer->update();
            // header("location:" . BASE . "/Manager/index/");
        } else {
            $printer = new \App\models\Printer();
            $printer = $printer->find($printer_id);
            $this->view('Printer/editPrinter', $printer_id);
        }
    }

}

?>