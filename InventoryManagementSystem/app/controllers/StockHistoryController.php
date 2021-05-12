<?php

namespace App\controllers;

class StockHistoryController extends \App\core\Controller {

    function index() {
        $users = new \App\models\User();
        $changes = new \App\models\StockHistory();
        $printers = new \App\models\Printer();
        $toners = new \App\models\Toner();


        $changes = $changes->getAllChanges();
        $users = $users->getAllUsers();
        $toners = $toners->getAllToners();
        $printers = $printers->getAllPrinters();

        $this->view('StockHistory/viewAllChanges', ['changes' => $changes, 'users' => $users, 'printers' => $printers, 'toners' => $toners]);
    }
}

?>