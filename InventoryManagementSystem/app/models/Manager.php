<?php

namespace App\models;

class Manager extends \App\core\Model {

    public $manager_id;
    public $user_id;
    public $first_name;
    public $last_name;
    public $email;
    public $phoneNo;

    public function __construct() {
        parent::__construct();
    }

    public function find($buyer_id) {
        $stmt = self::$connection->prepare("SELECT * FROM manager WHERE manager_id = :manager_id");
        $stmt->execute(['manager_id' => $manager_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Manager");
        return $stmt->fetch();
    }

    public function findUserId($user_id) {
        $stmt = self::$connection->prepare("SELECT * FROM manager WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $user_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Manager");
        return $stmt->fetch();
    }

    public function getAllManagers() {
        $stmt = self::$connection->query("SELECT * FROM manager");
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Manager");
        return $stmt->fetchAll();
    }

    public function insert() {
        $stmt = self::$connection->prepare("INSERT INTO manager(user_id, first_name, last_name, email, phoneNo) 
        VALUES (:user_id, :first_name, :last_name, :email, :phoneNo)");
        $stmt->execute(['user_id' => $this->user_id, 'first_name' =>
            $this->first_name, 'last_name' => $this->last_name, 'email' => $this->email, 'phoneNo' => $this->phoneNo]);
    }

    public function delete() {
        $stmt = self::$connection->prepare("DELETE from manager WHERE manager_id=:manager_id");
        $stmt->execute(['manager_id' => $this->manager_id]);
    }

    public function update() {
        $stmt = self::$connection->prepare("UPDATE manager SET first_name=:first_name, last_name=:last_name,
        email=:email, phoneNo=:phoneNo WHERE manager_id=:manager_id");
        $stmt->execute(['first_name' => $this->first_name, 'last_name' => $this->last_name,
            'email' => $this->email, 'phoneNo' => $this->phoneNo, 'manager_id' => $this->manager_id]);
    }

}
