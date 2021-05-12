<?php

namespace App\models;

class Toner extends \App\core\Model {

    public $toner_id;
    public $toner_model;
    public $toner_brand;
    public $quantity;

    public function __construct() {
        parent::__construct();
    }

    public function find($toner_id) {
        $stmt = self::$connection->prepare("SELECT * FROM toner WHERE toner_id = :toner_id");
        $stmt->execute(['toner_id' => $toner_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Toner");
        return $stmt->fetch();
    }

    public function searchTonerModel($keyword) {
        $stmt = self::$connection->prepare("SELECT * FROM toner WHERE toner_model LIKE :keyword");
        $stmt->execute(['keyword'=>"%".$keyword."%"]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Toner");
        return $stmt->fetchAll();
    }

    public function searchTonerModelAsc($keyword) {
        $stmt = self::$connection->prepare("SELECT * FROM toner WHERE toner_model LIKE :keyword ORDER BY toner_model");
        $stmt->execute(['keyword'=>"%".$keyword."%"]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Toner");
        return $stmt->fetchAll();
    }

    public function searchTonerModelDesc($keyword) {
        $stmt = self::$connection->prepare("SELECT * FROM toner WHERE toner_model LIKE :keyword ORDER BY toner_model DESC");
        $stmt->execute(['keyword'=>"%".$keyword."%"]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Toner");
        return $stmt->fetchAll();
    }

    public function searchTonerModelStockAsc($keyword) {
        $stmt = self::$connection->prepare("SELECT * FROM toner WHERE toner_model LIKE :keyword ORDER BY quantity");
        $stmt->execute(['keyword'=>"%".$keyword."%"]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Toner");
        return $stmt->fetchAll();
    }

    public function searchTonerModelStockDesc($keyword) {
        $stmt = self::$connection->prepare("SELECT * FROM toner WHERE toner_model LIKE :keyword ORDER BY quantity DESC");
        $stmt->execute(['keyword'=>"%".$keyword."%"]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Toner");
        return $stmt->fetchAll();
    }

    public function searchTonerBrand($keyword) {
        $stmt = self::$connection->prepare("SELECT * FROM toner WHERE toner_brand LIKE :keyword");
        $stmt->execute(['keyword'=>"%".$keyword."%"]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Toner");
        return $stmt->fetchAll();
    }

    public function searchTonerBrandAsc($keyword) {
        $stmt = self::$connection->prepare("SELECT * FROM toner WHERE toner_brand LIKE :keyword ORDER BY toner_brand");
        $stmt->execute(['keyword'=>"%".$keyword."%"]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Toner");
        return $stmt->fetchAll();
    }

    public function searchTonerBrandDesc($keyword) {
        $stmt = self::$connection->prepare("SELECT * FROM toner WHERE toner_brand LIKE :keyword ORDER BY toner_brand DESC");
        $stmt->execute(['keyword'=>"%".$keyword."%"]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Toner");
        return $stmt->fetchAll();
    }

    public function searchTonerBrandStockAsc($keyword) {
        $stmt = self::$connection->prepare("SELECT * FROM toner WHERE toner_brand LIKE :keyword ORDER BY quantity");
        $stmt->execute(['keyword'=>"%".$keyword."%"]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Toner");
        return $stmt->fetchAll();
    }

    public function searchTonerBrandStockDesc($keyword) {
        $stmt = self::$connection->prepare("SELECT * FROM toner WHERE toner_brand LIKE :keyword ORDER BY quantity DESC");
        $stmt->execute(['keyword'=>"%".$keyword."%"]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Toner");
        return $stmt->fetchAll();
    }

    public function getAllToners() {
        $stmt = self::$connection->query("SELECT * FROM toner");
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Toner");
        return $stmt->fetchAll();
    }

    public function searchAllToner($keyword) {
        $stmt = self::$connection->prepare("SELECT * FROM toner WHERE toner_model LIKE :keyword OR toner_brand LIKE :keyword");
        $stmt->execute(['keyword'=>"%".$keyword."%"]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Toner");
        return $stmt->fetchAll();
    }

    public function searchAllTonersSortName($keyword) {
        $stmt = self::$connection->prepare("SELECT * FROM toner WHERE toner_model LIKE :keyword OR toner_brand LIKE :keyword ORDER BY toner_model");
        $stmt->execute(['keyword'=>"%".$keyword."%"]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Toner");
        return $stmt->fetchAll();
    }

    public function searchAllTonersSortNameDesc($keyword) {
        $stmt = self::$connection->prepare("SELECT * FROM toner WHERE toner_model LIKE :keyword OR toner_brand LIKE :keyword ORDER BY toner_model DESC");
        $stmt->execute(['keyword'=>"%".$keyword."%"]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Toner");
        return $stmt->fetchAll();
    }

    public function searchAllTonersSortStock($keyword) {
        $stmt = self::$connection->prepare("SELECT * FROM toner WHERE toner_model LIKE :keyword OR toner_brand LIKE :keyword ORDER BY quantity");
        $stmt->execute(['keyword'=>"%".$keyword."%"]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Toner");
        return $stmt->fetchAll();
    }

    public function searchAllTonersSortStockDesc($keyword) {
        $stmt = self::$connection->prepare("SELECT * FROM toner WHERE toner_model LIKE :keyword OR toner_brand LIKE :keyword ORDER BY quantity DESC");
        $stmt->execute(['keyword'=>"%".$keyword."%"]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Toner");
        return $stmt->fetchAll();
    }

//    public function searchAllRma($keyword) {
//        $stmt = self::$connection->prepare("SELECT * FROM toner WHERE rma_status = 'check' AND (toner_model LIKE :keyword OR toner_brand LIKE :keyword)");
//        $stmt->execute(['keyword'=>"%".$keyword."%"]);
//        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Toner");
//        return $stmt->fetchAll();
//    }
//
//    public function searchAllRmaSortName($keyword) {
//        $stmt = self::$connection->prepare("SELECT * FROM toner WHERE rma_status = 'check' AND (toner_model LIKE :keyword OR toner_brand LIKE :keyword) ORDER BY toner_model");
//        $stmt->execute(['keyword'=>"%".$keyword."%"]);
//        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Toner");
//        return $stmt->fetchAll();
//    }
//
//    public function searchAllRmaSortNameDesc($keyword) {
//        $stmt = self::$connection->prepare("SELECT * FROM toner WHERE rma_status = 'check' AND (toner_model LIKE :keyword OR toner_brand LIKE :keyword) ORDER BY toner_model DESC");
//        $stmt->execute(['keyword'=>"%".$keyword."%"]);
//        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Toner");
//        return $stmt->fetchAll();
//    }
//
//    public function searchAllRmaSortStock($keyword) {
//        $stmt = self::$connection->prepare("SELECT * FROM toner WHERE rma_status = 'check' AND (toner_model LIKE :keyword OR toner_brand LIKE :keyword) ORDER BY quantity");
//        $stmt->execute(['keyword'=>"%".$keyword."%"]);
//        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Toner");
//        return $stmt->fetchAll();
//    }
//
//    public function searchAllRmaSortStockDesc($keyword) {
//        $stmt = self::$connection->prepare("SELECT * FROM toner WHERE rma_status = 'check' AND (toner_model LIKE :keyword OR toner_brand LIKE :keyword) ORDER BY quantity DESC");
//        $stmt->execute(['keyword'=>"%".$keyword."%"]);
//        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Toner");
//        return $stmt->fetchAll();
//    }

    public function insert() {
        $stmt = self::$connection->prepare("INSERT INTO toner(toner_model, toner_brand, quantity) 
        VALUES (:toner_model, :toner_brand, :quantity)");
        $stmt->execute(['toner_model' =>
            $this->toner_model, 'toner_brand' => $this->toner_brand, 'quantity' => $this->quantity]);
    }

    public function delete() {
        $stmt = self::$connection->prepare("DELETE from toner WHERE toner_id=:toner_id");
        $stmt->execute(['toner_id' => $this->toner_id]);
    }

    public function update() {
        $stmt = self::$connection->prepare("UPDATE toner SET toner_id=:toner_id, toner_model=:toner_model, toner_brand=:toner_brand, quantity=:quantity WHERE toner_id=:toner_id");
        $stmt->execute(['toner_id' => $this->toner_id, 'toner_model' => $this->toner_model, 
            'toner_brand' => $this->toner_brand, 'quantity' => $this->quantity]);
    }

}