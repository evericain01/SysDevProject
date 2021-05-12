<?php

namespace App\controllers;

use DateTime;
use DateTimeZone;

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

            $printerQuantity = $printer->quantity;
            
            $printer->quantity -= $_POST["quantity_deducted"];
            $rma->rma_reason = $_POST["rma"];
            $rma->rma_quantity = $_POST["quantity_deducted"];

            $date = new DateTime(null, new DateTimeZone("America/Toronto"));
            $result = $date->format('Y-m-d H:i:s');
            $rma->date = $result;

            if ($printer->quantity >= 0) {
                $printer->update();
                $rma->insert();
                header("location:" . BASE . "/Printer/index");
            } else {

                header("location:" . BASE . "/RMA/rmaPrinter/$printer_id?error=Quantity excceded: printer has $printerQuantity in stock");
            }
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

            $tonerQuantity = $toner->quantity;

            $toner->quantity -= $_POST["quantity_deducted"];
            $rma->rma_reason = $_POST["rma"];
            $rma->rma_quantity = $_POST["quantity_deducted"];

            $date = new DateTime(null, new DateTimeZone("America/Toronto"));
            $result = $date->format('Y-m-d H:i:s');
            $rma->date = $result;

            if ($toner->quantity >= 0) {
                $toner->update();
                $rma->insert();
                header("location:" . BASE . "/Toner/index");
            } else {

                header("location:" . BASE . "/RMA/rmaToner/$toner_id?error=Quantity excceded: printer has $tonerQuantity in stock");
            }
        } else {
            $toner = new \App\models\Toner();
            $toner = $toner->find($toner_id);
            $this->view('RMA/addTonerRma', $toner);
        }
    }

}

?>