<?php
include_once "models/ingredient.php";
include_once "models/tool.php";

class ProductPage extends Page{
    public function __construct(PDO $pdo) {
        $this->page_name = 'product';

        $id = $_GET['id'];
        $productQ = $pdo->prepare("SELECT category, name, description, producer, country, price, quantity FROM product WHERE id = :id");
        $productQ->bindParam('id', $id);
        $productQ->execute();
        $product_data = $productQ->fetch();

        switch ($product_data['category']) {
            case 1:
                $getIngredientQ = $pdo->query("SELECT energy, nutrition, components, weight FROM ingredient WHERE general_info = $id");
                $ingredient_info = $getIngredientQ->fetch();
                $this->product = new Ingredient($id, $product_data['category'], $product_data['name'],
            $product_data['producer'], $product_data['country'], $product_data['price'],
            explode(',', $ingredient_info['nutrition']), $ingredient_info['energy'],
            $ingredient_info['components'], $ingredient_info['weight'], $product_data['quantity']);
                break;
            case 2:
                $getToolQ = $pdo->query("SELECT material FROM tool WHERE general_info = $id");
                $tool_info = $getToolQ->fetch();
                $this->product = new Tool($id, $product_data['category'], $product_data['name'],
            $product_data['producer'], $product_data['country'], $product_data['price'],
            $tool_info['material'], $product_data['quantity']);
                break;
        }
    }
}

$current_page = new ProductPage($pdo);