<?php

namespace App\core;

#[\Attribute]

class SellerFilter {

    function execute() {
        
        if ($_SESSION['user_role'] != 'seller') {
            header('location:' . BASE . '/Buyer/index');
        }
    }

}
