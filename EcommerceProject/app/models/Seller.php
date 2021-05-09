<?php

namespace App\models;

class Seller extends \App\core\Model {

    public $user_id;
    public $first_name;
    public $last_name;
    public $brand_name;
    public $seller_id;

    public function __construct() {
        parent::__construct();
    }

    public function find($seller_id) {
        $stmt = self::$connection->prepare("SELECT * FROM seller WHERE seller_id = :seller_id");
        $stmt->execute(['seller_id' => $seller_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Seller");
        return $stmt->fetch();
    }


    public function findUserId($user_id) {
        $stmt = self::$connection->prepare("SELECT * FROM seller WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $user_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Seller");
        return $stmt->fetch();
    }

    public function getAllSellers() {
        $stmt = self::$connection->query("SELECT * FROM seller");
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Seller");
        return $stmt->fetchAll();
    }

    public function insert() {
        $stmt = self::$connection->prepare("INSERT INTO seller(user_id, first_name, last_name, brand_name) 
        VALUES (:user_id, :first_name, :last_name, :brand_name)");
        $stmt->execute(['user_id' => $this->user_id, 'first_name' =>
            $this->first_name, 'last_name' => $this->last_name, 'brand_name' => $this->brand_name]);
    }

    public function delete() {
        $stmt = self::$connection->prepare("DELETE from seller WHERE seller_id=:seller_id");
        $stmt->execute(['seller_id' => $this->seller_id]);
    }

    public function update() {
        $stmt = self::$connection->prepare("UPDATE profile SET first_name=:first_name, last_name=:last_name,
        brand_name=:brand_name WHERE seller_id=:seller_id");
        $stmt->execute(['first_name' => $this->first_name, 'last_name' => $this->last_name,
            'brand_name' => $this->brand_name, 'seller_id' => $this->seller_id]);
    }

}
