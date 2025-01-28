<?php
require_once 'models/ingredient.php';
require_once 'models/tool.php';
require_once 'models/basket.php';

class OrderPage extends Page{
    public array $products;

    public function __construct() {
        $this->page_name = 'order';

        $basket = unserialize(Session::get('basket'));

        $this->products = $basket->getItems();
    }
}

$current_page = new OrderPage();