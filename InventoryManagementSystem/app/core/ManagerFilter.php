<?php

namespace App\core;

#[\Attribute]

class ManagerFilter {

    function execute() {
        
        if ($_SESSION['user_role'] != 'Manager') {
            header('location:' . BASE . '/Manager/index');
        }
    }

}