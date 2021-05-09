<?php

namespace App\core;

#[\Attribute]

class BuyerFilter {

    function execute() {
        
        if ($_SESSION['user_role'] != 'buyer') {
            header('location:' . BASE . '/Seller/index');
        }
    }

}
