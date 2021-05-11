<?php

namespace App\models;

class Employee extends \App\core\Model {

    public $employee_id;
    public $user_id;
    public $first_name;
    public $last_name;
    public $email;
    public $phone_No;

    public function __construct() {
        parent::__construct();
    }

    public function find($employee_id) {
        $stmt = self::$connection->prepare("SELECT * FROM employee WHERE employee_id = :employee_id");
        $stmt->execute(['employee_id' => $employee_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Employee");
        return $stmt->fetch();
    }

    public function findUserId($user_id) {
        $stmt = self::$connection->prepare("SELECT * FROM employee WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $user_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Employee");
        return $stmt->fetch();
    }

    public function getAllEmployees() {
        $stmt = self::$connection->query("SELECT * FROM employee");
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Employee");
        return $stmt->fetchAll();
    }

    public function insert() {
        $stmt = self::$connection->prepare("INSERT INTO employee(user_id, first_name, last_name, email, phone_No) 
        VALUES (:user_id, :first_name, :last_name, :email, :phone_No)");
        $stmt->execute(['user_id' => $this->user_id, 'first_name' =>
            $this->first_name, 'last_name' => $this->last_name, 'email' => $this->email, 'phone_No' => $this->phone_No]);
    }

    public function delete() {
        $stmt = self::$connection->prepare("DELETE from employee WHERE employee_id=:employee_id");
        $stmt->execute(['employee_id' => $this->employee_id]);
    }

    public function update() {
        $stmt = self::$connection->prepare("UPDATE employee SET first_name=:first_name, last_name=:last_name,
        email=:email, phone_No=:phone_No WHERE employee_id=:employee_id");
        $stmt->execute(['first_name' => $this->first_name, 'last_name' => $this->last_name,
            'email' => $this->email, 'phone_No' => $this->phone_No, 'employee_id' => $this->employee_id]);
    }

}
