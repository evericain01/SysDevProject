<?php

namespace App\controllers;

class ManagerController extends \App\core\Controller {
    
    #[\App\core\ManagerFilter]
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

    function addEmployee() {
        // if (isset($_POST["action"])) {
        //     $employee = new \App\models\Employee();
        //     $employee->first_name = $_POST["first_name"];
        //     $employee->last_name = $_POST["last_name"];
        //     $employee->email = $_POST["email"];
        //     $employee->phone_No = $_POST["phone"];

        //     $employee->insert();
        //     header("location:" . BASE . "/Manager/index/");
        // } else {
            $this->view('Default/register');
        // }
    }

    function addUser() {
        $this->view('Default/register');
    }

    function promote($employee_id) {
            $employee = new \App\models\Employee();
            $manager = new \App\models\Manager();
            $user = new \App\models\User();

            $employee = $employee->find($employee_id);

            $manager->user_id = $employee->user_id;
            $manager->first_name = $employee->first_name;
            $manager->last_name = $employee->last_name;
            $manager->email = $employee->email;
            $manager->phone_No = $employee->phone_No;

            $_SESSION['user_role'] = "manager";
            $user->user_role = "manager";
            $user->update;

            $manager->insert();
            $employee->delete();
            header("location:" . BASE . "/Manager/index/");
    }

    function demote($manager_id) {
            $employee = new \App\models\Employee();
            $manager = new \App\models\Manager();
            $user = new \App\models\User();

            $user = $user->find($user_id);
            $manager = $manager->find($manager_id);

            $_SESSION['user_role'] = "employee";
            $user->user_role = "employee";
            $user->update;

            $employee->user_id = $manager->user_id;
            $employee->first_name = $manager->first_name;
            $employee->last_name = $manager->last_name;
            $employee->email = $manager->email;
            $employee->phone_No = $manager->phone_No;

            $employee->insert();
            $manager->delete();
            header("location:" . BASE . "/Manager/index/");
    }

    function addTonerRma($toner_id) {
        if (isset($_POST["action"])) {
            $rma = new \App\models\RMA();

            $rma->toner_id = $toner_id;
            $rma->rma_reason = $_POST["rma_reason"];

            // header("location:" . BASE . "/Manager/index/");
        } else {
            // $this->view('Default/register');
        }
    }

    function addPrinterRma($printer_id) {
        if (isset($_POST["action"])) {
            $rma = new \App\models\RMA();

            $rma->toner_id = $printer_id;
            $rma->rma_reason = $_POST["rma_reason"];

            // header("location:" . BASE . "/Manager/index/");
        } else {
            // $this->view('Default/register');
        }
    }

    function removeRma($rma_id) {
        if (isset($_POST["action"])) {
            $rma = new \App\models\RMA();

            $rma = $rma->find($rma_id);
            // header("location:" . BASE . "/Manager/index/");
        } else {
            // $this->view('Default/register');
        }
    }
}

?>