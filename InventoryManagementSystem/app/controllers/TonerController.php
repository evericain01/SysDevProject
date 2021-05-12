<?php

namespace App\controllers;

class TonerController extends \App\core\Controller {

    function index() {
        if (isset($_POST["action"])) {

            $keyword = $_POST["keyword"];
            $toner = new \App\models\Toner();

            if (isset($_POST['filter'])) {
                if ($_POST['filter'] == 'model') {
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
                } elseif ($_POST['filter'] == 'brand') {
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
                if (isset($_POST['sort'])) {
                    if ($_POST['sort'] == 'nameAsc') {
                        $toner = $toner->getAllTonersSortName();
                    } elseif ($_POST['sort'] == 'nameDesc') {
                        $toner = $toner->getAllTonersSortNameDesc();
                    } elseif ($_POST['sort'] == 'stockAsc') {
                        $toner = $toner->getAllTonersSortStock();
                    } elseif ($_POST['sort'] == 'stockDesc') {
                        $toner = $toner->getAllTonersSortStockDesc();
                    } else {
                        $toner = $toner->searchTonerModel($keyword);
                    }
                } else {
                    $toner = $toner->getAllToners();
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
            header("location:" . BASE . "/Toner/index");
        } else {
            $this->view('Toner/addNewToner');
        }
    }

    function update($toner_id) {
        if (isset($_POST["action"])) {
            $toner = new \App\models\Toner();
            $toner = $toner->find($toner_id);

            $toner->quantity = $_POST["quantity"];

            $toner->update();
            header("location:" . BASE . "/Toner/index");
        } else {
            $toner = new \App\models\Toner();
            $toner = $toner->find($toner_id);
            $this->view('Toner/editToner', $toner);
        }
    }

}

?>