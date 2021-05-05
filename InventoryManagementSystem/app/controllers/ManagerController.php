<?php

namespace App\controllers;

class ManagerController extends \App\core\Controller {
    function index() {
    }

    function addEmployee() {
        if (isset($_POST["action"])) {
            $employee = new \App\models\Employee();
            $employee->user_id = $_SESSION['user_id'];
            $employee->first_name = $_POST["first_name"];
            $employee->last_name = $_POST["last_name"];
            $employee->email = $_POST["email"];
            $employee->phone_No = $_POST["phone"];

            $employee->insert();
            header("location:" . BASE . "/Manager/index/");
        } else {
            // $this->view('Employee/createEmployee', $employee);
        }
    }

    function promote($employee_id) {
        if (isset($_POST["action"])) {
            $employee = new \App\models\Employee();
            $manager = new \App\models\Manager();

            $employee = $employee->find($employee);

            $manager->user_id = $_SESSION['user_id'];
            $manager->first_name = $_POST["first_name"];
            $manager->last_name = $_POST["last_name"];
            $manager->email = $_POST["email"];
            $manager->phone_No = $_POST["phone"];

            $manager->insert();
            $employee->delete();
            header("location:" . BASE . "/Manager/index/");
        } else {
            // $this->view('Employee/createEmployee', $employee);
        }
    }

    function demote($manager_id) {
        if (isset($_POST["action"])) {
            $employee = new \App\models\Employee();
            $manager = new \App\models\Manager();

            $manager = $manager->find($employee);

            $employee->user_id = $_SESSION['user_id'];
            $employee->first_name = $_POST["first_name"];
            $employee->last_name = $_POST["last_name"];
            $employee->email = $_POST["email"];
            $employee->phone_No = $_POST["phone"];

            $employee->insert();
            $manager->delete();
            header("location:" . BASE . "/Manager/index/");
        } else {
            // $this->view('Employee/createEmployee', $employee);
        }
    }

}

?>