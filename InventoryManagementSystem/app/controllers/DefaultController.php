<?php

namespace App\controllers;

class DefaultController extends \App\core\Controller {

    function index() {
        header('location:' . BASE . '/Login/login');
    }

    function register($manager_id) {
        if (isset($_POST['action'])) {
            if ($_POST['password'] == $_POST['password_confirm']) {
                $user = new \App\models\User();
                $user->username = $_POST['username'];
                $user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $user->user_role = "Employee";

                $result = $user->insert();

                if ($result == false) {
                    header('location:' . BASE . '/Default/register?error=Passwords do not match!');
                    return;
                }

                $employee = new \App\models\Employee();
                $employee->user_id = $user->user_id;
                $employee->first_name = $_POST['first_name'];
                $employee->last_name = $_POST['last_name'];
                $employee->email = $_POST['email'];
                $employee->phone_No = $_POST['phone_No'];

                $employee->insert();

                $manager = new \App\models\Manager();
                $manager = $manager->find($manager_id);

                $this->view('Manager/managerMainPage', $manager);
            } else
                header('location:' . BASE . '/Login/register?error=Passwords do not match!');
        } else {
            $this->view('Login/createAccount');
        }
    }

    function editManagerPassword() {
        $user = new \App\models\User();
        $user = $user->find($_SESSION['username']);

        if (isset($_POST["action"])) {
            if ($_POST["oldPassword"] != "") {
                if (password_verify($_POST['oldPassword'], $user->password_hash)) {

                    if ($_POST['newPassword'] == $_POST['reTypePassword']) {
                        $user->password_hash = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
                        $user->update($_SESSION['username']);
                        echo "Password Successfully Changed!<br><br>";
                        echo "<a href = '" . BASE . "/Manager/index' >&#8592 Go Back to Home Page</a>";
                    } else {
                        echo "Password does not match.<br><br>";
                        echo "<a href = '" . BASE . "/Default/editManagerPassword' >&#8592 Go Back to Change Password</a>";
                    }
                } else {
                    echo "Invalid old password.<br><br>";
                    echo "<a href = '" . BASE . "/Default/editManagerPassword' >&#8592 Go Back to Change Password</a>";
                }
            } else {
                echo "Input a new password.<br><br>";
                echo "<a href = '" . BASE . "/Default/editManagerPassword' >&#8592 Go Back to Change Password</a>";
            }
        } else {
            $this->view('Manager/changeManagerPassword');
        }
    }

    function editEmployeePassword() {
        $user = new \App\models\User();
        $user = $user->find($_SESSION['username']);

        if (isset($_POST["action"])) {
            if ($_POST["oldPassword"] != "") {
                if (password_verify($_POST['oldPassword'], $user->password_hash)) {

                    if ($_POST['newPassword'] == $_POST['reTypePassword']) {
                        $user->password_hash = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
                        $user->update($_SESSION['username']);
                        echo "Password Successfully Changed!<br><br>";
                        echo "<a href = '" . BASE . "/Employee/index' >&#8592 Go Back to Home Page</a>";
                    } else {
                        echo "Password does not match.<br><br>";
                        echo "<a href = '" . BASE . "/Default/editEmployeePassword' >&#8592 Go Back to Change Password</a>";
                    }
                } else {
                    echo "Invalid old password.<br><br>";
                    echo "<a href = '" . BASE . "/Default/editEmployeePassword' >&#8592 Go Back to Change Password</a>";
                }
            } else {
                echo "Input a new password.<br><br>";
                echo "<a href = '" . BASE . "/Default/editEmployeePassword' >&#8592 Go Back to Change Password</a>";
            }
        } else {
            $this->view('Employee/changeEmployeePassword');
        }
    }

    function login() {
        if (isset($_POST['action'])) {
            $user = new \App\models\User();
            $user = $user->find($_POST['username']);

            if ($user != null && password_verify($_POST['password'], $user->password_hash)) {
                $_SESSION['user_id'] = $user->user_id;
                $_SESSION['username'] = $user->username;
                $_SESSION['user_role'] = $user->user_role;

                if ($_SESSION['user_role'] == 'Manager') {
                    header('location:' . BASE . '/Manager/managerMainPage');
                } else {
                    header('location:' . BASE . '/Employee/employeeMainPage');
                }
            } else
                header('location:' . BASE . '/Login/login?error=Username/password mismatch!');
        } else {
            $this->view('Login/login');
        }
    }

    function logout() {
        session_destroy();
        header('location:' . BASE . '/');
    }

}
