<?php

namespace App\controllers;

class TonerController extends \App\core\Controller {
    function add() {
        if (isset($_POST["action"])) {
            $toner = new \App\models\Toner();
            $toner->toner_model = $_POST["toner_model"];
            $toner->toner_brand = $_POST["toner_brand"];
            $toner->quantity = $_POST["quantity"];
            $toner->rma_status = $_POST["rma"];

            $toner->insert();
            // header("location:" . BASE . "/Manager/index/");
        } else {
            // $this->view('Default/register');
        }
    }

    function update($toner_id) {
        if (isset($_POST["action"])) {
            $toner = new \App\models\Toner();
            $toner = $printer->find($toner_id);

            $toner->quantity = $_POST["quantity"];

            $toner->update();
            // header("location:" . BASE . "/Manager/index/");
        } else {
            $toner = new \App\models\Toner();
            $toner = $toner->find($toner_id);
            $this->view('Toner/editToner', $toner_id);
        }
    }
}

?>