<?php

namespace App\models;

class Printer extends \App\core\Model {

    public $printer_id;
    public $printer_model;
    public $printer_brand;
    public $quantity;
    public $rma_status; //should be an enum (check, unchecked)

    public function __construct() {
        parent::__construct();
    }

    public function find($printer_id) {
        $stmt = self::$connection->prepare("SELECT * FROM printer WHERE printer_id = :printer_id");
        $stmt->execute(['printer_id' => $printer_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Printer");
        return $stmt->fetch();
    }

    public function searchPrinter($keyword) {
        $stmt = self::$connection->prepare("SELECT * FROM printer WHERE printer_model LIKE :printer_model OR printer_brand LIKE :printer_brand");
        $keyword = "%$keyword%";
        $stmt->execute(['printer_model' => $keyword, 'printer_brand' => $keyword]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Printer");
        return $stmt->fetchAll();
    }
        
    public function getAllPrinters() {
        $stmt = self::$connection->query("SELECT * FROM printer");
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Printer");
        return $stmt->fetchAll();
    }

    public function printerStockAscending() {
        $stmt = self::$connection->query("SELECT * FROM printer ORDER BY stock");
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Printer");
        return $stmt->fetchAll();
    }

    public function printerStockDescending() {
        $stmt = self::$connection->query("SELECT * FROM printer ORDER BY stock DESC");
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Printer");
        return $stmt->fetchAll();
    }

    public function printerNameAscending() {
        $stmt = self::$connection->query("SELECT * FROM printer ORDER BY printer_model");
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Printer");
        return $stmt->fetchAll();
    }

    public function printerNameDescending() {
        $stmt = self::$connection->query("SELECT * FROM printer ORDER BY printer_model DESC");
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Printer");
        return $stmt->fetchAll();
    }

    public function insert() {
        $stmt = self::$connection->prepare("INSERT INTO printer(printer_model, printer_brand, quantity, rma_status) 
        VALUES (:printer_model, :printer_brand, :quantity, :rma_status)");
        $stmt->execute(['printer_model' =>
            $this->printer_model, 'printer_brand' => $this->printer_brand, 'quantity' => $this->quantity,
            'rma_status' => $this->rma_status]);
    }

    public function delete() {
        $stmt = self::$connection->prepare("DELETE from printer WHERE printer_id=:printer_id");
        $stmt->execute(['printer_id' => $this->printer_id]);
    }

    public function update() {
        $stmt = self::$connection->prepare("UPDATE printer SET printer_id=:printer_id, printer_model=:printer_model, printer_brand=:printer_brand, quantity=:quantity, rma_status=:rma_status WHERE printer_id=:printer_id");
        $stmt->execute(['printer_id' => $this->printer_id, 'printer_model' => $this->printer_model, 
            'printer_brand' => $this->printer_brand, 'quantity' => $this->quantity,'rma_status' => $this->rma_status]);
    }

}
