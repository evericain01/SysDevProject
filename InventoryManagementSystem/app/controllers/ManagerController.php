<?php

namespace App\controllers;

class ManagerController extends \App\core\Controller {
    #[\App\core\ManagerFilter]

    function index() {
        $manager = new \App\models\Manager();
        $manager = $manager->findUserId($_SESSION['user_id']);

        $this->view('Manager/managerMainPage', $manager);
    }

    function viewAllUsers() {
        $user = new \App\models\User();
        $employee = new \App\models\Employee();
        $manager = new \App\models\Manager();

        $user = $user->getAllUsers();
        $employee = $employee->getAllEmployees();
        $manager = $manager->getAllManagers();

        $this->view('Manager/listAllUsersForManager', ['users' => $user, 'managers' => $manager, 'employees' => $employee]);
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

        $user = $user->findByUserId($employee->user_id);
        $user->user_role = "Manager";
        $user->update($user->username);

        $manager->insert();
        $employee->delete();
        header("location:" . BASE . "/Manager/viewAllUsers");
    }

    function demote($manager_id) {
        $employee = new \App\models\Employee();
        $manager = new \App\models\Manager();
        $user = new \App\models\User();

        $manager = $manager->find($manager_id);

        $employee->user_id = $manager->user_id;
        $employee->first_name = $manager->first_name;
        $employee->last_name = $manager->last_name;
        $employee->email = $manager->email;
        $employee->phone_No = $manager->phone_No;

        $user = $user->findByUserId($manager->user_id);
        $user->user_role = "Employee";
        $user->update($user->username);

        $employee->insert();
        $manager->delete();
        header("location:" . BASE . "/Manager/viewAllUsers");
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

}

?>