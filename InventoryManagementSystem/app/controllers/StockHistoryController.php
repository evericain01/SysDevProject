<?php

namespace App\controllers;

class StockHistoryController extends \App\core\Controller {

    function viewPrinterHistory() {
        $users = new \App\models\User();
        $changes = new \App\models\StockHistory();
        $printers = new \App\models\Printer();

        $changes = $changes->getAllChanges();
        $users = $users->getAllUsers();
        $printers = $printers->getAllPrinters();

        $this->view('StockHistory/printerHistory', ['changes' => $changes, 'users' => $users, 'printers' => $printers]);
    }

    function viewTonerHistory() {
        $users = new \App\models\User();
        $changes = new \App\models\StockHistory();
        $toners = new \App\models\Toner();

        $changes = $changes->getAllChanges();
        $users = $users->getAllUsers();
        $toners = $toners->getAllToners();

        $this->view('StockHistory/tonerHistory', ['changes' => $changes, 'users' => $users, 'toners' => $toners]);
    }
}

?>