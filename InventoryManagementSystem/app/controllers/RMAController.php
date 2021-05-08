<?php

namespace App\controllers;

class RMAController extends \App\core\Controller {
    function index() {
        $printer = new \App\models\Printer();
        $toner = new \App\models\Toner();
        $rma = new \App\models\RMA();

        $printer = $printer->getAllPrinter();
        $toner = $toner->getAllToners();
        $rma = $rma->getAllRma();

        // $this->view('Manager/mainPage', ['printers' => $printer, 'toners' => $toner, 'rmas' => $rma]);
    }

    function rmaToner($toner_id) {
        if (isset($_POST["action"])) {
            $toner = new \App\models\Printer();
            $toner = $printer->find($toner_id);

            $toner->rma = $_POST["rma"];

            $toner->update();
            // header("location:" . BASE . "/Manager/index/");
        } else {
            $toner = new \App\models\Toner();
            $toner = $toner->find($toner_id);
            $this->view('Toner/editTonerRma', $toner_id);
        }
    }

    function rmaPrinter($printer_id) {
        if (isset($_POST["action"])) {
            $printer = new \App\models\Printer();
            $printer = $printer->find($printer_id);

            $printer->rma = $_POST["rma"];

            $printer->update();
            // header("location:" . BASE . "/Manager/index/");
        } else {
            $printer = new \App\models\Printer();
            $printer = $printer->find($printer_id);
            $this->view('Toner/editPrinterRma', $printer_id);
        }
    }
}

?>