<?php

namespace App\models;

class Toner extends \App\core\Model {

    public $toner_id;
    public $toner_model;
    public $toner_brand;
    public $quantity;
    public $rma_status; //should be an enum (check, unchecked)

    public function __construct() {
        parent::__construct();
    }

    public function find($toner_id) {
        $stmt = self::$connection->prepare("SELECT * FROM toner WHERE toner_id = :toner_id");
        $stmt->execute(['toner_id' => $toner_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Toner");
        return $stmt->fetch();
    }

    public function searchToner($keyword) {
        $stmt = self::$connection->prepare("SELECT * FROM toner WHERE toner_model LIKE :toner_model OR toner_brand LIKE :toner_brand");
        $keyword = "%$keyword%";
        $stmt->execute(['toner_model' => $keyword, 'toner_brand' => $keyword]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Toner");
        return $stmt->fetchAll();
    }
        
    public function getAllToners() {
        $stmt = self::$connection->query("SELECT * FROM toner");
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Toner");
        return $stmt->fetchAll();
    }

    public function insert() {
        $stmt = self::$connection->prepare("INSERT INTO toner(toner_model, toner_brand, quantity, rma_status) 
        VALUES (:toner_model, :toner_brand, :quantity, :rma_status)");
        $stmt->execute(['toner_model' =>
            $this->toner_model, 'toner_brand' => $this->toner_brand, 'quantity' => $this->quantity,
            'rma_status' => $this->rma_status]);
    }

    public function delete() {
        $stmt = self::$connection->prepare("DELETE from toner WHERE toner_id=:toner_id");
        $stmt->execute(['toner_id' => $this->toner_id]);
    }

    public function update() {
        $stmt = self::$connection->prepare("UPDATE toner SET toner_id=:toner_id, toner_model=:toner_model, toner_brand=:toner_brand, quantity=:quantity, rma_status=:rma_status WHERE toner_id=:toner_id");
        $stmt->execute(['toner_id' => $this->toner_id, 'toner_model' => $this->toner_model, 
            'toner_brand' => $this->toner_brand, 'quantity' => $this->quantity,'rma_status' => $this->rma_status]);
    }

}