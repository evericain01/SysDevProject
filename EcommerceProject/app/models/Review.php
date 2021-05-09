<?php

namespace App\models;

class Review extends \App\core\Model {

    public $review_id;
    public $product_id;
    public $buyer_id;
    public $rate;
    public $text_review;
    public $date;

    public function __construct() {
        parent::__construct();
    }

    public function find($review_id) {
        $stmt = self::$connection->prepare("SELECT * FROM review WHERE review_id = :review_id");
        $stmt->execute(['review_id' => $review_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Review");
        return $stmt->fetch();
    }

    public function getAllReviews() {
        $stmt = self::$connection->query("SELECT * FROM review");
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Review");
        return $stmt->fetchAll();
    }

    public function getAllReviewsOfBuyer($buyer_id) {
        $stmt = self::$connection->prepare("SELECT * FROM review WHERE buyer_id = :buyer_id");
        $stmt->execute(['buyer_id' => $buyer_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Review");
        return $stmt->fetchAll();
    }

    public function getReviewsOfProduct($product_id) {
        $stmt = self::$connection->prepare("SELECT * FROM review WHERE product_id = :product_id");
        $stmt->execute(['product_id' => $product_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Review");
        return $stmt->fetchAll();
    }

    public function insert() {
        $stmt = self::$connection->prepare("INSERT INTO review(product_id, buyer_id, rate, text_review, date) 
        VALUES (:product_id, :buyer_id, :rate, :text_review, :date)");
        $stmt->execute(['product_id' => $this->product_id, 'buyer_id' =>
            $this->buyer_id, 'rate' => $this->rate, 'text_review' => $this->text_review, 'date' => $this->date]);
    }

    public function delete() {
        $stmt = self::$connection->prepare("DELETE FROM review WHERE review_id=:review_id");
        $stmt->execute(['review_id' => $this->review_id]);
    }

    public function update() {
        $stmt = self::$connection->prepare("UPDATE review SET product_id=:product_id,"
                . " buyer_id=:buyer_id, rate=:rate, text_review=:text_review, date=:date WHERE review_id=:review_id");
        $stmt->execute(['product_id' => $this->product_id, 'buyer_id' => $this->buyer_id,
            'rate' => $this->rate, 'text_review' => $this->text_review , 'date'=> $this->date ,'review_id' => $this->review_id]);
    }

}
