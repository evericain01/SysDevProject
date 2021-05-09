<?php

namespace App\controllers;

class DefaultController extends \App\core\Controller {

    function index() {
        $this->view('Default/index');
    }

    function register() {
        if (isset($_POST['action'])) {
            if ($_POST['password'] == $_POST['password_confirm']) {
                $user = new \App\models\User();
                $user->username = $_POST['username'];
                $user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $user->user_role = $_POST['user_role'];

                $result = $user->insert();

                $_SESSION['user_id'] = $user->user_id;
                $_SESSION['username'] = $user->username;
                $_SESSION['user_role'] = $user->user_role;
                if ($result == false) {
                    header('location:' . BASE . '/Default/register?error=' . _("Passwords do not match") . '!');
                    return;
                }

                if ($_SESSION['user_role'] == 'buyer') {
                    header('location:' . BASE . '/Buyer/createProfile');
                } else {
                    header('location:' . BASE . '/Seller/createProfile');
                }
            } else
                header('location:' . BASE . '/Default/register?error='. _("Passwords do not match") .'!');
        } else {
            $this->view('Login/Register');
        }
    }

    function editBuyerPassword() {
        $user = new \App\models\User();
        $user = $user->find($_SESSION['username']);

        if (isset($_POST["action"])) {
            if ($_POST["oldPassword"] != "") {
                if (password_verify($_POST['oldPassword'], $user->password_hash)) {

                    if ($_POST['newPassword'] == $_POST['reTypePassword']) {
                        $user->password_hash = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
                        $user->update($_SESSION['username']);
                        echo _("Password Successfully Changed") . "!<br><br>";
                        echo "<a href = '" . BASE . "/Buyer/index' >&#8592 " . _("Go Back to Home Page") . "</a>";
                    } else {
                        echo _("Password does not match.") . "<br><br>";
                        echo "<a href = '" . BASE . "/Default/editBuyerPassword' >&#8592 " . _("Go Back to Change Password") . "</a>";
                    }
                } else {
                    echo _("Invalid old password.") . "<br><br>";
                    echo "<a href = '" . BASE . "/Default/editBuyerPassword' >&#8592 " . _("Go Back to Change Password") . "</a>";
                }
            } else {
                echo _("Input a new password.") . "<br><br>";
                echo "<a href = '" . BASE . "/Default/editBuyerPassword' >&#8592 " . _("Go Back to Change Password") . "</a>";
            }
        } else {
            $this->view('Buyer/changeBuyerPassword');
        }
    }

    function editSellerPassword() {
        $user = new \App\models\User();
        $user = $user->find($_SESSION['username']);

        if (isset($_POST["action"])) {
            if ($_POST["oldPassword"] != "") {
                if (password_verify($_POST['oldPassword'], $user->password_hash)) {

                    if ($_POST['newPassword'] == $_POST['reTypePassword']) {
                        $user->password_hash = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
                        $user->update($_SESSION['username']);
                        echo _("Password Successfully Changed") . "!<br><br>";
                        echo "<a href = '" . BASE . "/Seller/index' >&#8592 Go Back to Home Page</a>";
                    } else {
                        echo _("Password does not match.") . "<br><br>";
                        echo "<a href = '" . BASE . "/Default/editBuyerPassword' >&#8592 " . _("Go Back to Change Password") . "</a>";
                    }
                } else {
                    echo _("Invalid old password.") . "<br><br>";
                    echo "<a href = '" . BASE . "/Default/editBuyerPassword' >&#8592 " . _("Go Back to Change Password") . "</a>";
                }
            } else {
                echo _("Input a new password.") . "<br><br>";
                echo "<a href = '" . BASE . "/Default/editBuyerPassword' >&#8592 " . _("Go Back to Change Password") . "</a>";
            }
        } else {
            $this->view('Seller/changeSellerPassword');
        }
    }

    function goToChooseLanguage() {
        $this->view('Default/chooseLanguage');
    }

    function login() {
        if (isset($_POST['action'])) {
            $user = new \App\models\User();
            $user = $user->find($_POST['username']);

            if ($user != null && password_verify($_POST['password'], $user->password_hash)) {
                $_SESSION['user_id'] = $user->user_id;
                $_SESSION['username'] = $user->username;
                $_SESSION['user_role'] = $user->user_role;

                if ($_SESSION['user_role'] == 'buyer') {
                    header('location:' . BASE . '/Buyer/buyerMainPage');
                } else {
                    header('location:' . BASE . '/Seller/sellerMainPage');
                }
            } else
                header('location:' . BASE . '/Default/login?error=Wrong username or password.');
        } else {
            $this->view('Login/login');
        }
    }

    function logout() {
        session_destroy();
        header('location:' . BASE . '/Default/login');
    }

}
