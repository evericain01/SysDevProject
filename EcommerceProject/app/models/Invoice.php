<?php

namespace App\models;

class Invoice extends \App\core\Model {

    public $seller_id;
    public $buyer_id;
    public $product_id;
    public $timestamp;
    public $date_of_arrival;
    public $invoice_id;

    public function __construct() {
        parent::__construct();
    }

    public function find($buyer_id, $seller_id, $product_id) {
        $stmt = self::$connection->prepare("SELECT * FROM invoice WHERE buyer_id = :buyer_id AND
        seller_id = :seller_id AND product_id = :product_id");
        $stmt->execute(['buyer_id' => $buyer_id, 'seller_id' => $seller_id, 'product_id' => $product_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Invoice");
        return $stmt->fetch();
    }

    public function findInvoiceId($invoice_id) {
        $stmt = self::$connection->prepare("SELECT * FROM invoice WHERE invoice_id = :invoice_id");
        $stmt->execute(['invoice_id' => $invoice_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Invoice");
        return $stmt->fetch();
    }

    public function getAllInvoiceOfBuyer($buyer_id) {
        $stmt = self::$connection->prepare("SELECT * FROM invoice WHERE buyer_id = :buyer_id ORDER BY timestamp DESC");
        $stmt->execute(['buyer_id' => $buyer_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Invoice");
        return $stmt->fetchAll();
    }

    public function insert() {
        $stmt = self::$connection->prepare("INSERT INTO invoice(buyer_id, seller_id, product_id, date_of_arrival, total, status) 
        VALUES (:buyer_id, :seller_id, :product_id, DATE_ADD(UTC_DATE(), INTERVAL 7 DAY), :total, :status)");
        $stmt->execute(['buyer_id' => $this->buyer_id, 'seller_id' => $this->seller_id, 'product_id' =>
            $this->product_id, 'total' => $this->total, 'status' => $this->status]);
    }

    public function delete() {
        $stmt = self::$connection->prepare("DELETE from invoice WHERE invoice_id=:invoice_id");
        $stmt->execute(['invoice_id' => $this->invoice_id]);
    }

    public function update() {
        $stmt = self::$connection->prepare("UPDATE invoice SET buyer_id=:buyer_id, seller_id=:seller_id, product_id=:product_id, date_of_arrival=:date_of_arrival, total=:total, status=:status WHERE invoice_id=:invoice_id");
        $stmt->execute(['buyer_id' => $this->buyer_id, 'seller_id' => $this->seller_id,
            'product_id' => $this->product_id, 'date_of_arrival' => $this->date_of_arrival, 'total' => $this->total, 'status'
            => $this->status, 'invoice_id' => $this->invoice_id]);
    }

    public function findCheckout($buyer_id) {
        $stmt = self::$connection->prepare("SELECT * FROM invoice WHERE buyer_id = :buyer_id AND timestamp = UTC_TIMESTAMP()");
        $stmt->execute(['buyer_id' => $buyer_id, 'timestamp' => $timestamp]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Invoice");
        return $stmt->fetchAll();
    }
}
