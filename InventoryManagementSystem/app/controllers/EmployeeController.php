<?php

namespace App\controllers;

class EmployeeController extends \App\core\Controller {
    
    #[\App\core\EmployeeFilter]
    function index() {
        $employee = new \App\models\Employee();
        $manager = new \App\models\Manager();
        $printer = new \App\models\Printer();
        $toner = new \App\models\Toner();
        $rma = new \App\models\RMA();

        $employee = $employee->getAllEmployees();
        $manager = $manager->getAllManagers();
        $printer = $printer->getAllPrinter();
        $toner = $toner->getAllToners();
        $rma = $rma->getAllRma();

        $this->view('Manager/mainPage', ['managers'=> $manager, 'employees' => $employee, 'printers' => $printer, 'toners' => $toner, 'rmas' => $rma]);
    }

    function edit() {
        $employee = new \App\models\Employee();
        $employee = $employee->findUserId($_SESSION['user_id']);

        if (isset($_POST["action"])) {
            $employee->first_name = $_POST["first_name"];
            $employee->last_name = $_POST["last_name"];
            $employee->email = $_POST["email"];
            $employee->phone_No = $_POST["phone"];

            $employee->insert();
            header("location:" . BASE . "/Manager/index/");
        } else {
            $this->view('Manager/addEmployee');
        }
    }
}

?>