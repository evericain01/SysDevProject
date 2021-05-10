<?php

namespace App\controllers;

class RMAController extends \App\core\Controller {
    function index() {
        $rma = new \App\models\RMA();
        $printer = new \App\models\Printer();
        $toner = new \App\models\Toner();

        $toner = $toner->getAllToners();
        $printer = $printer->getAllPrinters();

        $this->view('RMA/viewRma', ['rma' => $rma, 'toners' => $toners, 'printers' => $printer]);
    }

    function rmaPrinter($printer_id) {
        if (isset($_POST["action"])) {
            $printer = new \App\models\Printer();
            $printer = $printer->find($printer_id);

            $printer->rma = $_POST["rma"];

            $printer->update();
            header("location:" . BASE . "/Printer/index");
        } else {
            $printer = new \App\models\Printer();
            $printer = $printer->find($printer_id);
            $this->view('Printer/editPrinterRma', $printer_id);
        }
    }

    function rmaToner($toner_id) {
        if (isset($_POST["action"])) {
            $toner = new \App\models\Toner();
            $toner = $toner->find($toner_id);

            $toner->rma = $_POST["rma"];

            $toner->update();
            header("location:" . BASE . "/Toner/index");
        } else {
            $toner = new \App\models\Toner();
            $toner = $toner->find($toner_id);
            $this->view('Toner/editTonerRma', $toner_id);
        }
    }

    function deleteToner($rma_id) {
        $rma = new \App\models\RMA();
        $rma = $rma->find($rma_id);
        $rma->delete();
        header("location:" . BASE . "/RMA/index");
    }
}

?>