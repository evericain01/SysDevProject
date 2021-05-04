<?php

namespace App\core;

#[\Attribute]

class EmployeeFilter {

    function execute() {
        
        if ($_SESSION['user_role'] != 'Employee') {
            header('location:' . BASE . '/Manager/index');
        }
    }

}