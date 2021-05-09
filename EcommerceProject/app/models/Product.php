<?php

namespace App\models;

class Product extends \App\core\Model {

    public $product_id;
    public $seller_id;
    public $caption;
    public $filename;
    public $description;
    public $quantity;
    public $price;

    public function __construct() {
        parent::__construct();
    }

    public function find($product_id) {
        $stmt = self::$connection->prepare("SELECT * FROM product WHERE product_id = :product_id");
        $stmt->execute(['product_id' => $product_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Product");
        return $stmt->fetch();
    }

    public function findSellerProducts($seller_id) {
        $stmt = self::$connection->prepare("SELECT * FROM product WHERE seller_id = :seller_id");
        $stmt->execute(['seller_id' => $seller_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Seller");
        return $stmt->fetch();
    }

    public function searchProducts($keyword) {
        $stmt = self::$connection->prepare("SELECT * FROM product WHERE caption LIKE :caption");
        $keyword = "%$keyword%";
        $stmt->execute(['caption' => $keyword]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Product");
        return $stmt->fetchAll();
    }
    
    public function getAllProducts() {
        $stmt = self::$connection->query("SELECT * FROM product");
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Product");
        return $stmt->fetchAll();
    }
    
    public function getAllProductsWithId($buyer_id) {
        $stmt = self::$connection->prepare("SELECT * FROM cart WHERE buyer_id = :buyer_id");
        $stmt->execute(['buyer_id' => $buyer_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Product");
        return $stmt->fetchAll();
    }

    public function insert() {
        $stmt = self::$connection->prepare("INSERT INTO product(seller_id, caption, filename, description, quantity, price) 
        VALUES (:seller_id, :caption, :filename, :description, :quantity, :price)");
        $stmt->execute(['seller_id' => $this->seller_id, 'caption' =>
            $this->caption, 'filename' => $this->filename, 'description' => $this->description,
            'quantity' => $this->quantity, 'price' => $this->price]);
    }

    public function delete() {
        $stmt = self::$connection->prepare("DELETE from product WHERE product_id=:product_id");
        $stmt->execute(['product_id' => $this->product_id]);
    }

    public function update() {
        $stmt = self::$connection->prepare("UPDATE product SET seller_id=:seller_id, caption=:caption, description=:description, quantity=:quantity, price=:price WHERE product_id=:product_id");
        $stmt->execute(['seller_id' => $this->seller_id, 'caption' => $this->caption, 
            'description' => $this->description, 'quantity' => $this->quantity,'price' => $this->price, 'product_id' 
            => $this->product_id]);
    }

}
