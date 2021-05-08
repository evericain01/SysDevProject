<?php

namespace App\models;

class RMA extends \App\core\Model {

    public $rma_id;
    public $printer_id; //Can be null
    public $toner_id; //Can be null
    public $date;
    public $rma_reason;

    public function __construct() {
        parent::__construct();
    }
    public function find($rma_id) {
        $stmt = self::$connection->prepare("SELECT * FROM rma WHERE rma_id = :rma_id");
        $stmt->execute(['rma_id' => $rma_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\RMA");
        return $stmt->fetch();
    }

    public function getAllRma() {
        $stmt = self::$connection->query("SELECT * FROM rma");
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\RMA");
        return $stmt->fetchAll();
    }

    public function insert() {
        $stmt = self::$connection->prepare("INSERT INTO rma(printer_id, toner_id, date, rma_reason) 
        VALUES (:printer_id, :toner_id, UTC_TIMESTAMP(), :rma_reason)");
        $stmt->execute(['printer_id' =>$this->printer_id, 'toner_id' => $this->toner_id, 'rma_reason' => $this->rma_reason]);
    }

    public function delete() {
        $stmt = self::$connection->prepare("DELETE from rma WHERE rma_id=:rma_id");
        $stmt->execute(['rma_id' => $this->rma_id]);
    }

}
