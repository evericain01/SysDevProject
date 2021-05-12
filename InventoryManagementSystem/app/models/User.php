<?php

namespace App\models;

class User extends \App\core\Model {

    public $username;
    public $password_hash;
    public $user_role;

    public function __construct() {
        parent::__construct();
    }

    public function getAllUsers() {
        $stmt = self::$connection->query("SELECT * FROM user");
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\User");
        return $stmt->fetchAll();
    }

    public function find($username) {
        $stmt = self::$connection->prepare("SELECT * FROM user WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\User");
        return $stmt->fetch();
    }

    public function findByUserId($user_id) {
        $stmt = self::$connection->prepare("SELECT * FROM user WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $user_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\User");
        return $stmt->fetch();
    }

    public function insert() {
        $stmt = self::$connection->prepare("INSERT INTO user(username, password_hash, user_role) VALUES (:username, :password_hash, :user_role)");
        $result = $stmt->execute(['username' => $this->username, 'password_hash' => $this->password_hash, 'user_role' => $this->user_role]);
        $this->user_id = self::$connection->lastInsertId();
        return $result;
    }

    public function update($username) {
        $stmt = self::$connection->prepare("UPDATE user SET password_hash=:password_hash, user_role=:user_role WHERE username = :username");
        $stmt->execute(['password_hash' => $this->password_hash, 'user_role' => $this->user_role, 'username' => $this->username]);
    }

}
