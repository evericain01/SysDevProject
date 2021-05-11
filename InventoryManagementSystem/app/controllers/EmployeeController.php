<?php

namespace App\controllers;

class EmployeeController extends \App\core\Controller {
    #[\App\core\EmployeeFilter]

    function index() {
        $employee = new \App\models\Employee();
        $employee = $employee->findUserId($_SESSION['user_id']);

        $this->view('Employee/employeeMainPage', $employee);
    }

    function viewAllUsers() {
        $employee = new \App\models\Employee();
        $manager = new \App\models\Manager();

        $employee = $employee->getAllEmployees();
        $manager = $manager->getAllManagers();

        $this->view('Employee/listAllUsersForEmployee', ['managers' => $manager, 'employees' => $employee]);
    }

}

?>