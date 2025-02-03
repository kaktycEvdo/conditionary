<?php

class ProfilePage extends Page{
    public function __construct(PDO $pdo) {
        require_once "models/user.php";

        $this->page_name = 'profile';

        if (!isset($_SESSION['user']) || $_SESSION['user'] == '') {
            ServerModal::staticThrowModal('Ошибка 405: Недостаточно прав', true, 'auth');
        }
        $user = unserialize(Session::get('user'));
        $user_id = $user->getID();

        $getOrdersQ = $pdo->query("SELECT products FROM orders WHERE user_id = $user_id");
        $getOrdersQ->execute();
        $orders = $getOrdersQ->fetchAll();
        $getProductFromOrderQ = $pdo->prepare("SELECT name, image, price, producer FROM product WHERE id = :id");
        $products = [];
        foreach ($orders as $order) {
            $product_list = json_decode($order['products']);
            $productw = [];
            foreach ($product_list as $product_id) {
                $getProductFromOrderQ->bindParam('id', $product_id);
                $getProductFromOrderQ->execute();
                array_push($productw, $getProductFromOrderQ->fetch());
            }
            
            array_push($products, $productw);
        }
        
        if($products) $this->orders = $products[0];
        else $this->orders = [];
        $this->user = $user;
    }
}

$current_page = new ProfilePage($pdo);