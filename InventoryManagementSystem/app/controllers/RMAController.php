<?php

namespace App\controllers;

class RMAController extends \App\core\Controller {

    function index() {
        $rmas = new \App\models\RMA();
        $printers = new \App\models\Printer();
        $toners = new \App\models\Toner();

        $rmas = $rmas->getAllRma();
        $toners = $toners->getAllToners();
        $printers = $printers->getAllPrinters();

        $this->view('RMA/viewRma', ['rmas' => $rmas, 'toners' => $toners, 'printers' => $printers]);
    }

    function delete($rma_id) {
        $rma = new \App\models\RMA();
        $rma = $rma->find($rma_id);
        $rma->delete();
        header("location:" . BASE . "/RMA/index");
    }

    function rmaPrinter($printer_id) {
        if (isset($_POST["action"])) {
            $printer = new \App\models\Printer();
            $printer = $printer->find($printer_id);

            $rma = new \App\models\RMA();
            $rma->printer_id = $printer_id;
            
            $rma->rma_reason = $_POST["rma"];
            $printer->quantity -= $_POST["quantity_deducted"];
            $rma->rma_quantity = $_POST["quantity_deducted"];
            
            $printer->update();
            $rma->insert();
            header("location:" . BASE . "/Printer/index");
        } else {
            $printer = new \App\models\Printer();
            $printer = $printer->find($printer_id);
            $this->view('RMA/addPrinterRma', $printer);
        }
    }

    function rmaToner($toner_id) {
        if (isset($_POST["action"])) {
            $toner = new \App\models\Toner();
            $toner = $toner->find($toner_id);

            $rma = new \App\models\RMA();
            $rma->toner_id = $toner_id;

            $rma->rma_reason = $_POST["rma"];
            $toner->quantity -= $_POST["quantity_deducted"];
            $rma->rma_quantity = $_POST["quantity_deducted"];

            $toner->update();
            $rma->insert();
            header("location:" . BASE . "/Toner/index");
        } else {
            $toner = new \App\models\Toner();
            $toner = $toner->find($toner_id);
            $this->view('RMA/addTonerRma', $toner);
        }
    }

}

?>