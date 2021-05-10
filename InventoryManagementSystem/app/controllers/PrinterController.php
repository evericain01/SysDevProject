<?php

namespace App\controllers;

class PrinterController extends \App\core\Controller {

    function index() {
        if (isset($_POST["action"])) {
            $keyword = $_POST["keyword"];
            $printer = new \App\models\Printer();
            $printer = $printer->searchPrinter($keyword);

            if ($keyword == "") {
                echo "INVALID: no printers found" . "<br><br>";
                echo "<a href='" . BASE . "/Printer/index'>&#8592 Go back</a>";
            }

            if ($_POST["sort"] == "name descending") {
                $printer = $printer->printerNameDescending();
            } else if ($_POST["sort"] == "stock ascending") {
                $printer = $printer->printerStockAscending();
            } else if ($_POST["sort"] == "stock descending") {
                $printer = $printer->printerStockDescending();
            } else if ($_POST["sort"] == "name ascending") {
                $printer = $printer->printerNameAscending();
            } else {
                $printer = $printer->getAllPrinters();
            }

            header("location:" . BASE . "/Printer/index");
        } else {
            $printer = new \App\models\Printer();
            $printer = $printer->getAllPrinters();
            $this->view('Printer/viewPrinterStock', $printer);
        }
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