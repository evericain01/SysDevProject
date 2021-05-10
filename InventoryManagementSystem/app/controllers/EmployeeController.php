<?php

namespace App\controllers;

class EmployeeController extends \App\core\Controller {
    
    #[\App\core\EmployeeFilter]
    function index() {
        $employee = new \App\models\Employee();
        $employee = $employee->findUserId($_SESSION['user_id']);

        $this->view('Employee/employeeMainPage', $employee);
    }

    function edit($employee_id) {
        if (isset($_POST["action"])) {
            $employee = new \App\models\Employee();
            $employee = $employee->find($employee_id);
            
            $employee->first_name = $_POST['first_name'];
            $employee->last_name = $_POST['last_name'];
            $employee->email = $_POST['email'];
            $employee->phone_No = $_POST['phone_No'];

            $employee->update();

            header("location:" . BASE . "/Employee/index");
        } else {
            $manager = new \App\models\Manager();
            $manager = $manager->find($employee_id);
            
            $this->view('Employee/modifyEmployeeProfile', $employee);
        }
    }

    function viewAllUsers() {
        $employee = new \App\models\Employee();
        $manager = new \App\models\Manager();

        $manager = $manager->getAllManagers();
        $employee = $employee->getAllEmployees();

        $this->view('Employee/listAllUsersForEmployee', ['managers' => $manager, 'employees' => $employee]);
    }
}

?>