<?php
require_once "model.php";
class Order extends Model{
    private int $user_id;
    private array $products;

    public function __construct($user_id, $products) {
        $this->user_id = $user_id;
        $this->products = $products;
    }

    public function initializeOrder(PDO $pdo){
        $orderQ = $pdo->prepare("INSERT INTO orders(user_id, products) VALUES (:id, :pd)");
        $orderQ->bindParam('id', $this->user_id);
        $products = [];
        foreach ($this->products as $product) {
            array_push($products, $product->getID());
        }
        $jsonString = json_encode($products);
        $orderQ->bindParam('pd', $jsonString);
        $orderQ->execute();
    }
}