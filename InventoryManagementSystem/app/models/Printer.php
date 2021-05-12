<?php

namespace App\models;

class Printer extends \App\core\Model {

    public $printer_id;
    public $printer_model;
    public $printer_brand;
    public $quantity;

    public function __construct() {
        parent::__construct();
    }

    public function find($printer_id) {
        $stmt = self::$connection->prepare("SELECT * FROM printer WHERE printer_id = :printer_id");
        $stmt->execute(['printer_id' => $printer_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Printer");
        return $stmt->fetch();
    }

    public function searchPrinterModel($keyword) {
        $stmt = self::$connection->prepare("SELECT * FROM printer WHERE printer_model LIKE :keyword");
        $stmt->execute(['keyword'=>"%".$keyword."%"]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Printer");
        return $stmt->fetchAll();
    }

    public function searchPrinterModelAsc($keyword) {
        $stmt = self::$connection->prepare("SELECT * FROM printer WHERE printer_model LIKE :keyword ORDER BY printer_model");
        $stmt->execute(['keyword'=>"%".$keyword."%"]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Printer");
        return $stmt->fetchAll();
    }

    public function searchPrinterModelDesc($keyword) {
        $stmt = self::$connection->prepare("SELECT * FROM printer WHERE printer_model LIKE :keyword ORDER BY printer_model DESC");
        $stmt->execute(['keyword'=>"%".$keyword."%"]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Printer");
        return $stmt->fetchAll();
    }

    public function searchPrinterModelStockAsc($keyword) {
        $stmt = self::$connection->prepare("SELECT * FROM printer WHERE printer_model LIKE :keyword ORDER BY quantity");
        $stmt->execute(['keyword'=>"%".$keyword."%"]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Printer");
        return $stmt->fetchAll();
    }

    public function searchPrinterModelStockDesc($keyword) {
        $stmt = self::$connection->prepare("SELECT * FROM printer WHERE printer_model LIKE :keyword ORDER BY quantity DESC");
        $stmt->execute(['keyword'=>"%".$keyword."%"]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Printer");
        return $stmt->fetchAll();
    }

    public function searchPrinterBrand($keyword) {
        $stmt = self::$connection->prepare("SELECT * FROM printer WHERE printer_brand LIKE :keyword");
        $stmt->execute(['keyword'=>"%".$keyword."%"]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Printer");
        return $stmt->fetchAll();
    }

    public function searchPrinterBrandAsc($keyword) {
        $stmt = self::$connection->prepare("SELECT * FROM printer WHERE printer_brand LIKE :keyword ORDER BY printer_brand");
        $stmt->execute(['keyword'=>"%".$keyword."%"]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Printer");
        return $stmt->fetchAll();
    }

    public function searchPrinterBrandDesc($keyword) {
        $stmt = self::$connection->prepare("SELECT * FROM printer WHERE printer_brand LIKE :keyword ORDER BY printer_brand DESC");
        $stmt->execute(['keyword'=>"%".$keyword."%"]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Printer");
        return $stmt->fetchAll();
    }

    public function searchPrinterBrandStockAsc($keyword) {
        $stmt = self::$connection->prepare("SELECT * FROM printer WHERE printer_brand LIKE :keyword ORDER BY quantity");
        $stmt->execute(['keyword'=>"%".$keyword."%"]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Printer");
        return $stmt->fetchAll();
    }

    public function searchPrinterBrandStockDesc($keyword) {
        $stmt = self::$connection->prepare("SELECT * FROM printer WHERE printer_brand LIKE :keyword ORDER BY quantity DESC");
        $stmt->execute(['keyword'=>"%".$keyword."%"]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Printer");
        return $stmt->fetchAll();
    }
        
    public function getAllPrinters() {
        $stmt = self::$connection->query("SELECT * FROM printer");
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Printer");
        return $stmt->fetchAll();
    }

    public function searchAllPrinters($keyword) {
        $stmt = self::$connection->prepare("SELECT * FROM printer WHERE printer_brand LIKE :keyword OR printer_model LIKE :keyword");
        $stmt->execute(['keyword'=>"%".$keyword."%"]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Printer");
        return $stmt->fetchAll();
    }

    public function searchAllPrintersSortName($keyword) {
        $stmt = self::$connection->prepare("SELECT * FROM printer WHERE printer_brand LIKE :keyword OR printer_model LIKE :keyword ORDER BY printer_model");
        $stmt->execute(['keyword'=>"%".$keyword."%"]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Printer");
        return $stmt->fetchAll();
    }

    public function searchAllPrintersSortNameDesc($keyword) {
        $stmt = self::$connection->prepare("SELECT * FROM printer WHERE printer_brand LIKE :keyword OR printer_model LIKE :keyword ORDER BY printer_model DESC");
        $stmt->execute(['keyword'=>"%".$keyword."%"]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Printer");
        return $stmt->fetchAll();
    }

    public function searchAllPrintersSortStock($keyword) {
        $stmt = self::$connection->prepare("SELECT * FROM printer WHERE printer_brand LIKE :keyword OR printer_model LIKE :keyword ORDER BY quantity");
        $stmt->execute(['keyword'=>"%".$keyword."%"]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Printer");
        return $stmt->fetchAll();
    }

    public function searchAllPrintersSortStockDesc($keyword) {
        $stmt = self::$connection->prepare("SELECT * FROM printer WHERE printer_brand LIKE :keyword OR printer_model LIKE :keyword ORDER BY quantity DESC");
        $stmt->execute(['keyword'=>"%".$keyword."%"]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Printer");
        return $stmt->fetchAll();
    }

//    public function searchAllRma($keyword) {
//        $stmt = self::$connection->prepare("SELECT * FROM printer WHERE rma_status = 'check' AND (printer_model LIKE :keyword OR printer_brand LIKE :keyword)");
//        $stmt->execute(['keyword'=>"%".$keyword."%"]);
//        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Printer");
//        return $stmt->fetchAll();
//    }
//
//    public function searchAllRmaSortName($keyword) {
//        $stmt = self::$connection->prepare("SELECT * FROM printer WHERE rma_status = 'check' AND (printer_model LIKE :keyword OR printer_brand LIKE :keyword) ORDER BY printer_model");
//        $stmt->execute(['keyword'=>"%".$keyword."%"]);
//        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Printer");
//        return $stmt->fetchAll();
//    }
//
//    public function searchAllRmaSortNameDesc($keyword) {
//        $stmt = self::$connection->prepare("SELECT * FROM printer WHERE rma_status = 'check' AND (printer_model LIKE :keyword OR printer_brand LIKE :keyword) ORDER BY printer_model DESC");
//        $stmt->execute(['keyword'=>"%".$keyword."%"]);
//        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Printer");
//        return $stmt->fetchAll();
//    }
//
//    public function searchAllRmaSortStock($keyword) {
//        $stmt = self::$connection->prepare("SELECT * FROM printer WHERE rma_status = 'check' AND (printer_model LIKE :keyword OR printer_brand LIKE :keyword) ORDER BY quantity");
//        $stmt->execute(['keyword'=>"%".$keyword."%"]);
//        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Printer");
//        return $stmt->fetchAll();
//    }
//
//    public function searchAllRmaSortStockDesc($keyword) {
//        $stmt = self::$connection->prepare("SELECT * FROM printer WHERE rma_status = 'check' AND (printer_model LIKE :keyword OR printer_brand LIKE :keyword) ORDER BY quantity DESC");
//        $stmt->execute(['keyword'=>"%".$keyword."%"]);
//        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Printer");
//        return $stmt->fetchAll();
//    }

    public function insert() {
        $stmt = self::$connection->prepare("INSERT INTO printer(printer_model, printer_brand, quantity) 
        VALUES (:printer_model, :printer_brand, :quantity)");
        $result = $stmt->execute(['printer_model' =>
            $this->printer_model, 'printer_brand' => $this->printer_brand, 'quantity' => $this->quantity]);
        return $result;
    }

    public function delete() {
        $stmt = self::$connection->prepare("DELETE from printer WHERE printer_id=:printer_id");
        $stmt->execute(['printer_id' => $this->printer_id]);
    }

    public function update() {
        $stmt = self::$connection->prepare("UPDATE printer SET printer_id=:printer_id, printer_model=:printer_model, printer_brand=:printer_brand, quantity=:quantity WHERE printer_id=:printer_id");
        $stmt->execute(['printer_id' => $this->printer_id, 'printer_model' => $this->printer_model, 
            'printer_brand' => $this->printer_brand, 'quantity' => $this->quantity]);
    }

}
