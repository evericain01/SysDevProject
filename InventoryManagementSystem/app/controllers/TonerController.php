<?php

namespace App\controllers;

class TonerController extends \App\core\Controller {

    function index() {
        if (isset($_POST["action"])) {
            $keyword = $_POST["keyword"];
            $toner = new \App\models\Toner();
            $toner = $toner->searchToner($keyword);

            if ($keyword == "") {
                echo "INVALID: no toners found" . "<br><br>";
                echo "<a href='" . BASE . "/Toner/index'>&#8592 Go back</a>";
            }

            if ($_POST["sort"] == "name descending") {
                $toner = $toner->tonerNameDescending();
            } else if ($_POST["sort"] == "stock ascending") {
                $toner = $toner->tonerStockAscending();
            } else if ($_POST["sort"] == "stock descending") {
                $toner = $toner->tonerStockDescending();
            } else if ($_POST["sort"] == "name ascending") {
                $toner = $toner->tonerNameAscending();
            } else {
                $toner = $toner->getAllToners();
            }

            header("location:" . BASE . "/Toner/index");
        } else {
            $this->view('Toner/viewTonerStock');
        }
    }

    function add() {
        if (isset($_POST["action"])) {
            $toner = new \App\models\Toner();

            $toner->printer_model = $_POST["printer_model"];
            $toner->printer_brand = $_POST["printer_brand"];
            $toner->quantity = 1;

            $toner->rma_status = 'unchecked';
            
            $toner->insert();
            header("location:" . BASE . "/Toner/index");
        } else {
            $this->view('Toner/viewTonerStock');
        }
    }

    function update($toner_id) {
        if (isset($_POST["action"])) {
            $toner = new \App\models\Printer();
            $toner = $toner->find($toner_id);

            $toner->quantity = $_POST["quantity"];

            if ($_SESSION['user_role'] == 'Manager') {
                $toner->rma_status = $_POST["rma"];
            } 

            $toner->update();
            header("location:" . BASE . "/Toner/index");
        } else {
            $toner = new \App\models\Printer();
            $toner = $toner->find($toner_id);
            $this->view('Toner/editToner', $toner_id);
        }
    }
}

?>