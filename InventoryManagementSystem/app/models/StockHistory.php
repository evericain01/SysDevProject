<?php

namespace App\models;

class StockHistory extends \App\core\Model {

    public $stock_history_id;
    public $user_id;
    public $printer_id;
    public $toner_id;
    public $date;

    public function __construct() {
        parent::__construct();
    }

    public function getAllChanges() {
        $stmt = self::$connection->query("SELECT * FROM stock_history");
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\StockHistory");
        return $stmt->fetchAll();
    }

    public function getFromUser($user_id) {
        $stmt = self::$connection->prepare("SELECT * FROM stock_history WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $user_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\StockHistory");
        return $stmt->fetchAll();
    }

    public function insert() {
        $stmt = self::$connection->prepare("INSERT INTO stock_history(user_id, printer_id, toner_id, date) 
        VALUES (:user_id, :printer_id, :toner_id, :date)");
        $stmt->execute(['user_id' => $this->user_id, 'printer_id' =>
            $this->printer_id, 'toner_id' => $this->toner_id, 'date' => $this->date]);
    }
}
