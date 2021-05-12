<?php

namespace App\controllers;

use DateTime;
use DateTimeZone;

class TonerController extends \App\core\Controller {

    function index() {

        // Checks if the form was submitted.
        if (isset($_POST["action"])) {

            // Sets the keyword to what was in the search text input.
            $keyword = $_POST["keyword"];

            // Creates a new toner model
            $toner = new \App\models\Toner();

            // Checks if the user has set a filter.
            if (isset($_POST['filter'])) {
                // Checks if the filter is set to model.
                if ($_POST['filter'] == 'model') {
                    // Checks if the user has set a sorting method.
                    // Sets toner to an array of toner objects by searching the toners by model then sorting by the chosen method.
                    if (isset($_POST['sort'])) {
                        if ($_POST['sort'] == 'nameAsc') {
                            $toner = $toner->searchTonerModelAsc($keyword);
                        } elseif ($_POST['sort'] == 'nameDesc') {
                            $toner = $toner->searchTonerModelDesc($keyword);
                        } elseif ($_POST['sort'] == 'stockAsc') {
                            $toner = $toner->searchTonerModelStockAsc($keyword);
                        } elseif ($_POST['sort'] == 'stockDesc') {
                            $toner = $toner->searchTonerModelStockDesc($keyword);
                        } else {
                            $toner = $toner->searchTonerModel($keyword);
                        }
                    } else {
                        $toner = $toner->searchTonerModel($keyword);
                    }
                    // Checks if the filter is set to brand.
                } elseif ($_POST['filter'] == 'brand') {
                    // Checks if the user has set a sorting method.
                    // Sets toner to an array of toner objects by searching the toners by brand then sorting by the chosen method.
                    if (isset($_POST['sort'])) {
                        if ($_POST['sort'] == 'nameAsc') {
                            $toner = $toner->searchTonerBrandAsc($keyword);
                        } elseif ($_POST['sort'] == 'nameDesc') {
                            $toner = $toner->searchTonerBrandDesc($keyword);
                        } elseif ($_POST['sort'] == 'stockAsc') {
                            $toner = $toner->searchTonerBrandStockAsc($keyword);
                        } elseif ($_POST['sort'] == 'stockDesc') {
                            $toner = $toner->searchTonerBrandStockDesc($keyword);
                        } else {
                            $toner = $toner->searchTonerBrand($keyword);
                        }
                    } else {
                        $toner = $toner->searchTonerBrand($keyword);
                    }
                }
            } else {
                // Checks if only a sorting method is set.
                // Sets toner to an array of toner objects by searching the toners by brand and model then sorting by the chosen method.
                if (isset($_POST['sort'])) {
                    if ($_POST['sort'] == 'nameAsc') {
                        $toner = $toner->searchAllTonersSortName($keyword);
                    } elseif ($_POST['sort'] == 'nameDesc') {
                        $toner = $toner->searchAllTonersSortNameDesc($keyword);
                    } elseif ($_POST['sort'] == 'stockAsc') {
                        $toner = $toner->searchAllTonersSortStock($keyword);
                    } elseif ($_POST['sort'] == 'stockDesc') {
                        $toner = $toner->searchAllTonersSortStockDesc($keyword);
                    } else {
                        $toner = $toner->searchAllToner($keyword);
                    }
                } else {
                    $toner = $toner->searchAllToner($keyword);
                }
            }
            $this->view('Toner/viewTonerStock', $toner);
        } else {
            $toner = new \App\models\Toner();
            $toner = $toner->getAllToners();
            $this->view('Toner/viewTonerStock', $toner);
        }
    }

    function add() {
        if (isset($_POST["action"])) {
            $toner = new \App\models\Toner();

            $toner->toner_model = $_POST["model"];
            $toner->toner_brand = $_POST["brand"];
            $toner->quantity = $_POST["quantity"];

            $toner->insert();

            $date = new DateTime(null, new DateTimeZone("America/Toronto"));
            $dateResult = $date->format('Y-m-d H:i:s');

            $change = new \App\models\StockHistory();
            $change->user_id = $_SESSION['user_id'];
            $change->toner_id = $toner->toner_id;

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

            $change->type_of_change = "ADDED TONER:<br>" . " Quantity: $toner->quantity";
            $change->date = $dateResult;
            $change->insert();

            header("location:" . BASE . "/Toner/index");
        } else {
            $this->view('Toner/addNewToner');
        }
    }

    function update($toner_id) {
        if (isset($_POST["action"])) {
            $toner = new \App\models\Toner();
            $toner = $toner->find($toner_id);

            $previousStock = $toner->quantity;
            $newStock = $_POST["quantity"];

            $toner->quantity = $_POST["quantity"];

            $toner->update();

            $date = new DateTime(null, new DateTimeZone("America/Toronto"));
            $result = $date->format('Y-m-d H:i:s');

            $change = new \App\models\StockHistory();
            $change->user_id = $_SESSION['user_id'];
            $change->toner_id = $toner_id;

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
                $change->type_of_change = "$toner->model" . " STOCK: +" . $newStock - $previousStock;
            } else {
                $change->type_of_change = "$toner->model" . " STOCK: -" . $previousStock - $newStock;
            }

            $change->date = $result;

            $change->insert();

            header("location:" . BASE . "/Toner/index");
        } else {
            $toner = new \App\models\Toner();
            $toner = $toner->find($toner_id);
            $this->view('Toner/editToner', $toner);
        }
    }

}

?>