<?php

namespace App\controllers;

use DateTime;
use DateTimeZone;

class PrinterController extends \App\core\Controller {

    function index() {
        if (isset($_POST["action"])) {

            $keyword = $_POST["keyword"];
            $printer = new \App\models\Printer();

            if (isset($_POST['filter'])) {
                if($_POST['filter'] == 'model'){
                    if(isset($_POST['sort'])){
                        if($_POST['sort'] == 'nameAsc'){
                            $printer = $printer->searchPrinterModelAsc($keyword);
                        } elseif ($_POST['sort'] == 'nameDesc') {
                            $printer = $printer->searchPrinterModelDesc($keyword);
                        } elseif ($_POST['sort'] == 'stockAsc') {
                            $printer = $printer->searchPrinterModelStockAsc($keyword);
                        } elseif ($_POST['sort'] == 'stockDesc') {
                            $printer = $printer->searchPrinterModelStockDesc($keyword);
                        } else {
                            $printer = $printer->searchPrinterModel($keyword);
                        }
                    } else {
                        $printer = $printer->searchPrinterModel($keyword);
                    }                    
                } elseif ($_POST['filter'] == 'brand') {
                    if(isset($_POST['sort'])){
                        if($_POST['sort'] == 'nameAsc'){
                            $printer = $printer->searchPrinterBrandAsc($keyword);
                        } elseif ($_POST['sort'] == 'nameDesc') {
                            $printer = $printer->searchPrinterBrandDesc($keyword);
                        } elseif ($_POST['sort'] == 'stockAsc') {
                            $printer = $printer->searchPrinterBrandStockAsc($keyword);
                        } elseif ($_POST['sort'] == 'stockDesc') {
                            $printer = $printer->searchPrinterBrandStockDesc($keyword);
                        } else {
                            $printer = $printer->searchPrinterBrand($keyword);
                        }
                    } else {
                        $printer = $printer->searchPrinterBrand($keyword);
                    }
                }
            } else {
                if(isset($_POST['sort'])){
                    if($_POST['sort'] == 'nameAsc'){
                        $printer = $printer->getAllPrintersSortName();
                    } elseif ($_POST['sort'] == 'nameDesc') {
                        $printer = $printer->getAllPrintersSortNameDesc();
                    } elseif ($_POST['sort'] == 'stockAsc') {
                        $printer = $printer->getAllPrintersSortStock();
                    } elseif ($_POST['sort'] == 'stockDesc') {
                        $printer = $printer->getAllPrintersSortStockDesc();
                    } else {
                        $printer = $printer->searchPrinterModel($keyword);
                    }
                } else {
                    $printer = $printer->getAllPrinters();
                }       
            }

            $this->view('Printer/viewPrinterStock', $printer);

        } else {
            $printer = new \App\models\Printer();
            $printer = $printer->getAllPrinters();
            $this->view('Printer/viewPrinterStock', $printer);
        }
    }

    function add() {
        if (isset($_POST["action"])) {
            $printer = new \App\models\Printer();

            $printer->printer_model = $_POST["model"];
            $printer->printer_brand = $_POST["brand"];
            $printer->quantity = $_POST["quantity"];
            
//            $printer->insert();
            
            $result = $printer->insert();

            
           
            
            $date = new DateTime(null, new DateTimeZone("America/Toronto"));
            $dateResult = $date->format('Y-m-d H:i:s');

            $change = new \App\models\StockHistory();
            $change->user_id = $_SESSION['user_id'];
            $change->printer_id = $result->printer_id;
            
//            var_dump($printer->printer_id);
            $change->date = $dateResult;

            $change->insert();

//            header("location:" . BASE . "/Printer/index");
        } else {
            $this->view('Printer/addNewPrinter');
        }
    }

    function update($printer_id) {
        if (isset($_POST["action"])) {
            $printer = new \App\models\Printer();
            $printer = $printer->find($printer_id);

            $printer->quantity = $_POST["quantity"];

            $printer->update();

            $date = new DateTime(null, new DateTimeZone("America/Toronto"));
            $result = $date->format('Y-m-d H:i:s');

            $change = new \App\models\StockHistory();
            $change->user_id = $_SESSION['user_id'];
            $change->printer_id = $printer_id;
            $change->date = $result;

            $change->insert();

            header("location:" . BASE . "/Printer/index");
        } else {
            $printer = new \App\models\Printer();
            $printer = $printer->find($printer_id);
            $this->view('Printer/editPrinter', $printer);
        }
    }

}

?>