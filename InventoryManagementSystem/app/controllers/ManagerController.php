<?php

namespace App\controllers;

class ManagerController extends \App\core\Controller {
    
    #[\App\core\ManagerFilter]
    function index() {
        $manager = new \App\models\Manager();

        $manager = $manager->findUserId($_SESSION['user_id']);
        $this->view('Manager/managerMainPage', $manager);
    }

    function edit($manager_id) {
        if (isset($_POST["action"])) {
            $manager = new \App\models\Manager();
            $manager = $manager->find($manager_id);
            
            $manager->first_name = $_POST['first_name'];
            $manager->last_name = $_POST['last_name'];
            $manager->email = $_POST['email'];
            $manager->phone_No = $_POST['phone_No'];

            $manager->update();

            header("location:" . BASE . "/Manager/index");
        } else {
            $manager = new \App\models\Manager();
            $manager = $manager->find($manager_id);
            
            $this->view('Manager/modifyManagerProfile', $manager);
        }
    }

    function addEmployee() {
        $this->view('Default/register');
    }

    function deleteEmployee($employee_id) {
        $employee = new \App\models\Employee();
        $employee = $employee->find($employee_id);
        $employee->delete();
        
        header("location:" . BASE . "/Manager/viewAllUsers");
    }

    function deleteManager($manager_id) {
        $manager = new \App\models\Manager();
        $manager = $manager->find($manager_id);
        $manager->delete();
        
        header("location:" . BASE . "/Manager/viewAllUsers");
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
        $user->update();

        $manager->insert();
        $employee->delete();
        header("location:" . BASE . "/Manager/index");
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
        header("location:" . BASE . "/Manager/index");
    }

    function addTonerRma($toner_id) {
        if (isset($_POST["action"])) {
            $rma = new \App\models\RMA();

            $rma->toner_id = $toner_id;
            $rma->printer_id = null;
            $rma->rma_reason = $_POST["rma_reason"];
            $rma->insert();

            header("location:" . BASE . "/Manager/index");
        } else {
            $this->view('Manager/managerMainPage');
        }
    }

    function addPrinterRma($printer_id) {
        if (isset($_POST["action"])) {
            $rma = new \App\models\RMA();

            $rma->printer_id = $printer_id;
            $rma->toner_id = null;
            $rma->rma_reason = $_POST["rma_reason"];

            $rma->insert();
            header("location:" . BASE . "/Manager/index");
        } else {
            $this->view('Manager/managerMainPage');
        }
    }

    function removeRma($rma_id) {
        if (isset($_POST["action"])) {
            $rma = new \App\models\RMA();
            $rma = $rma->find($rma_id);
            $rma->delete();

            header("location:" . BASE . "/Manager/index");
        } else {
            $this->view('Manager/managerMainPage');
        }
    }

    function viewAllUsers() {
        $employee = new \App\models\Employee();
        $manager = new \App\models\Manager();

        $manager = $manager->getAllManagers();
        $employee = $employee->getAllEmployees();

        $this->view('Manager/listAllUsersForManager', ['managers' => $manager, 'employees' => $employee]);
    }
}

?>