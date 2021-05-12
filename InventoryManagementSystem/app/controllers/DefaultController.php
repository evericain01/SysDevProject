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

                header('location:' . BASE . '/Manager/index');
                return;
            } else
                echo "<div style='color: red; font-size:20px'> Passwords do not match.</div><br>";
                $this->view('Default/createAccount');
                return;
        } else {
            $this->view('Default/createAccount');
        }
    }

    function editManagerAccount($manager_id) {
        $user = new \App\models\User();
        $user = $user->find($_SESSION['username']);

        if (isset($_POST["action"])) {
            $manager = new \App\models\Manager();
            $manager = $manager->find($manager_id);

            $manager->first_name = $_POST['first_name'];
            $manager->last_name = $_POST['last_name'];
            $manager->email = $_POST['email'];
            $manager->phone_No = $_POST['phone_No'];

            $manager->update();

            $user->username = $_POST['username'];
            $user->update($_SESSION['username']);


            if ($_POST["oldPassword"] != "") {
                if (password_verify($_POST['oldPassword'], $user->password_hash)) {

                    if ($_POST['newPassword'] == $_POST['reTypePassword']) {
                        $user->password_hash = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
                        $user->update($_SESSION['username']);
                    } else {
                        echo "<div style='color: red; font-size:20px'>Password does not match.</div><br><";
                        $this->view('Manager/modifyManagerAccount', ['user' => $user, 'manager' => $manager]);
                        return;
                    }
                } else {
                    echo "<div style='color: red; font-size:20px'>Invalid old password.</div><br>";
                    $this->view('Manager/modifyManagerAccount', ['user' => $user, 'manager' => $manager]);
                    return;
                }
            } else {
                echo "<div style='color: red; font-size:20px'>Input a new password.</div><br>";
                $this->view('Manager/modifyManagerAccount', ['user' => $user, 'manager' => $manager]);
                return;
            }

            $this->view('Manager/managerMainPage', $manager);
        } else {
            $manager = new \App\models\Manager();
            $manager = $manager->find($manager_id);
            $this->view('Manager/modifyManagerAccount', ['user' => $user, 'manager' => $manager]);
        }
    }

    function editEmployeeAccount($employee_id) {
        $user = new \App\models\User();
        $user = $user->find($_SESSION['username']);

        if (isset($_POST["action"])) {
            $employee = new \App\models\Employee();
            $employee = $employee->find($employee_id);

            $employee->first_name = $_POST['first_name'];
            $employee->last_name = $_POST['last_name'];
            $employee->email = $_POST['email'];
            $employee->phone_No = $_POST['phone_No'];

            $employee->update();

            $user->username = $_POST['username'];
            $user->update($_SESSION['username']);


            if ($_POST["oldPassword"] != "") {
                if (password_verify($_POST['oldPassword'], $user->password_hash)) {

                    if ($_POST['newPassword'] == $_POST['reTypePassword']) {
                        $user->password_hash = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
                        $user->update($_SESSION['username']);
                    } else {
                        echo "<div style='color: red; font-size:20px'>Password does not match.</div><br>";
                        $this->view('Employee/modifyEmployeeAccount', ['user' => $user, 'employee' => $employee]);
                        return;
                    }
                } else {
                    echo "<div style='color: red; font-size:20px'>Invalid old password.</div><br>";
                    $this->view('Employee/modifyEmployeeAccount', ['user' => $user, 'employee' => $employee]);
                    return;
                }
            } else {
                echo "<div style='color: red; font-size:20px'>Input a new password.</div><br>";
                $this->view('Employee/modifyEmployeeAccount', ['user' => $user, 'employee' => $employee]);
                return;
            }

            $this->view('Employee/employeeMainPage', $employee);
        } else {
            $employee = new \App\models\Employee();
            $employee = $employee->find($employee_id);
            $this->view('Employee/modifyEmployeeAccount', ['user' => $user, 'employee' => $employee]);
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
