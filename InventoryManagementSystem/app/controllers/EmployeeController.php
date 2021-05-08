<?php

namespace App\controllers;

class EmployeeController extends \App\core\Controller {
    
    #[\App\core\EmployeeFilter]
    function index() {
        $employee = new \App\models\Employee();
        $employee = $employee->findUserId($_SESSION['user_id']);

        $this->view('Employee/employeeMainPage', $employee);
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
            header("location:" . BASE . "/Employee/index");
        } else {
            $this->view('Employee/addEmployee');
        }
    }
}

?>