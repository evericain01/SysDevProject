<?php

namespace App\controllers;

class PrinterController extends \App\core\Controller {

    function index() {
        if (isset($_POST["action"])) {
            var_dump($_POST);

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
                } elseif ($_POST['filter'] == 'rma'){
                    if(isset($_POST['sort'])){
                        if($_POST['sort'] == 'nameAsc'){
                            $printer = $printer->searchAllRmaSortName($keyword);
                        } elseif ($_POST['sort'] == 'nameDesc') {
                            $printer = $printer->searchAllRmaSortNameDesc($keyword);
                        } elseif ($_POST['sort'] == 'stockAsc') {
                            $printer = $printer->searchAllRmaSortStock($keyword);
                        } elseif ($_POST['sort'] == 'stockDesc') {
                            $printer = $printer->searchAllRmaSortStockDesc($keyword);
                        } else {
                            $printer = $printer->searchAllRma($keyword);
                        }
                    } else {
                        $printer = $printer->searchAllRma($keyword);
                    }
                } else {
                    $printer = $printer->getAllPrinters();
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
            $this->view('Printer/editPrinter', $printer);
        }
    }

}

?>