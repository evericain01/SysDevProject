<?php

namespace App\controllers;

use DateTime;
use DateTimeZone;

class PrinterController extends \App\core\Controller {

    function index() {

        // Checks if the form was submitted.
        if (isset($_POST["action"])) {

            // Sets the keyword to what was in the search text input.
            $keyword = $_POST["keyword"];

            // Creates a new printer model.
            $printer = new \App\models\Printer();

            // Checks if the user has set a filter.
            if (isset($_POST['filter'])) {
                // Checks if the filter is set to model.
                if ($_POST['filter'] == 'model') {
                    // Checks if the user has set a sorting method.
                    // Sets printer to an array of printer objects by searching the printers by model then sorting by the chosen method.
                    if (isset($_POST['sort'])) {
                        if ($_POST['sort'] == 'nameAsc') {
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
                  // Checks if the filter is set to brand.
                } elseif ($_POST['filter'] == 'brand') {                
                    // Checks if the user has set a sorting method.
                    // Sets printer to an array of printer objects by searching the printers by brand then sorting by the chosen method.
                    if (isset($_POST['sort'])) {
                        if ($_POST['sort'] == 'nameAsc') {
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
                // Checks if only a sorting method is set.
                // Sets printer to an array of printer objects by searching the printers by brand and model then sorting by the chosen method.
                if (isset($_POST['sort'])) {
                    if ($_POST['sort'] == 'nameAsc') {
                        $printer = $printer->searchAllPrintersSortName($keyword);
                    } elseif ($_POST['sort'] == 'nameDesc') {
                        $printer = $printer->searchAllPrintersSortNameDesc($keyword);
                    } elseif ($_POST['sort'] == 'stockAsc') {
                        $printer = $printer->searchAllPrintersSortStock($keyword);
                    } elseif ($_POST['sort'] == 'stockDesc') {
                        $printer = $printer->searchAllPrintersSortStockDesc($keyword);
                    } else {
                        $printer = $printer->searchAllPrinters($keyword);
                    }
                } else {
                    $printer = $printer->searchAllPrinters($keyword);
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

            $printer->insert();

            $date = new DateTime(null, new DateTimeZone("America/Toronto"));
            $dateResult = $date->format('Y-m-d H:i:s');

            $change = new \App\models\StockHistory();
            $change->user_id = $_SESSION['user_id'];
            $change->printer_id = $printer->printer_id;

            if ($_SESSION['user_role'] == 'Manager') {
                $manager = new \App\models\Manager();
                $manager = $manager->findUserId($_SESSION['user_id']);

                $firstname = $manager->first_name;
                $lastname = $manager->last_name;

                $change->worker_name = $firstname . " " . $lastname;
            } else {
                $employee = new \App\models\Employee();
                $employee = $employee->findUserId($_SESSION['user_id']);

                $firstname = $employee->first_name;
                $lastname = $employee->last_name;

                $change->worker_name = $firstname . " " . $lastname;
            }

            $change->type_of_change = "ADDED PRINTER:<br>" . " Quantity: $printer->quantity";
            $change->date = $dateResult;
            $change->insert();

            header("location:" . BASE . "/Printer/index");
        } else {
            $this->view('Printer/addNewPrinter');
        }
    }

    function update($printer_id) {
        if (isset($_POST["action"])) {
            $printer = new \App\models\Printer();
            $printer = $printer->find($printer_id);

            $previousStock = $printer->quantity;
            $newStock = $_POST["quantity"];

            $printer->quantity = $_POST["quantity"];

            $printer->update();

            $date = new DateTime(null, new DateTimeZone("America/Toronto"));
            $result = $date->format('Y-m-d H:i:s');

            $change = new \App\models\StockHistory();
            $change->user_id = $_SESSION['user_id'];
            $change->printer_id = $printer_id;


            if ($_SESSION['user_role'] == 'Manager') {
                $manager = new \App\models\Manager();
                $manager = $manager->findUserId($_SESSION['user_id']);

                $firstname = $manager->first_name;
                $lastname = $manager->last_name;

                $change->worker_name = $firstname . " " . $lastname;
            } else {
                $employee = new \App\models\Employee();
                $employee = $employee->findUserId($_SESSION['user_id']);

                $firstname = $employee->first_name;
                $lastname = $employee->last_name;

                $change->worker_name = $firstname . " " . $lastname;
            }

            if ($previousStock < $newStock) {
                $change->type_of_change = "$printer->model" . " STOCK: +" . $newStock - $previousStock;
            } else {
                $change->type_of_change = "$printer->model" . " STOCK: -" . $previousStock - $newStock;
            }

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