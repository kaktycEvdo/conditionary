<?php
include_once 'connect_to_db.php';
include_once 'checking_module.php';
session_start();
if (!isset($_GET['item']) || $_GET['item'] == '') {
    echo 'error';
    die;
}
$need = $_GET['item'];
$command = $_GET['command'];

$data = 'a';

switch ($need) {
    case 'products': {
        switch ($command) {
            case 'getAll': {
                $q = $pdo->query("SELECT * FROM product");
                $products = $q->fetchAll();

                $ingredients = [];
                $tools = [];

                foreach ($products as $product_data) {
                    switch ($product_data['category']) {
                        // ингредиент
                        case 1: {
                            $pid = $product_data['id'];
                            $getIngredientQ = $pdo->query("SELECT energy, nutrition, components, weight FROM ingredient WHERE general_info = $pid");
                            $ingredient_info = $getIngredientQ->fetch();
                            $i = new Ingredient(
                                $product_data['id'],
                                $product_data['category'],
                                $product_data['name'],
                                $product_data['producer'],
                                $product_data['country'],
                                $product_data['price'],
                                explode(',', $ingredient_info['nutrition']),
                                $ingredient_info['energy'],
                                $ingredient_info['components'],
                                $ingredient_info['weight'],
                                $product_data['quantity'],
                                $product_data['description'],
                                $product_data['image']
                            );
                            array_push($ingredients, $i);
                            break;
                        }
                        // инструмент
                        case 2: {
                            $pid = $product_data['id'];
                            $getToolQ = $pdo->query("SELECT material FROM tool WHERE general_info = $pid");
                            $tool_info = $getToolQ->fetch();
                            $t = new Tool(
                                $product_data['id'],
                                $product_data['category'],
                                $product_data['name'],
                                $product_data['producer'],
                                $product_data['country'],
                                $product_data['price'],
                                $tool_info['material'],
                                $product_data['quantity'],
                                $product_data['description'],
                                $product_data['image']
                            );
                            array_push($tools, $t);
                            break;
                        }
                        default: {
                            break;
                        }
                    }
                }
                header('Content-Type: application/json; charset=utf-8');
                $data = array_merge($ingredients, $tools);
                echo json_encode($data);
                break;
            }
            case 'newForm': {
                header('Content-Type: text/html; charset=utf-8');
                include_once "views/components/new_product.php";
                break;
            }
            case 'newProduct': {
                $product_fields = ['name', 'description', 'category', 'producer', 'country', 'price', 'quantity', 'image'];
                $ingredient_fields = ['energy', 'nutrition', 'components', 'weight'];
                $tool_fields = ['material'];
                $newProductQ = $pdo->prepare("INSERT INTO product(name, description, category, producer, country, price, quantity, image) VALUES (:name, :description, :category, :producer, :country, :price, :quantity, :image)");
                $category = '';
                foreach ($product_fields as $field) {
                    switch($field){
                        case 'category':
                            $category = $_POST[$field];
                            $newProductQ->bindParam($field, $_POST[$field]);
                            break;
                        case 'image':{
                            $img = $_FILES['image'];
                        
                            $imgname = $img['name'];
                            $to = "static/img/products/$imgname";

                            if(!is_dir('static/img/products')){
                                mkdir('static/img/products');
                            }

                            $imgVal = validateMedia($img, $to);
                            if($imgVal[0]){
                                ServerModal::staticThrowModal($imgVal[1], 1, 'admin');
                                echo 'error';
                            }
                
                            $newProductQ->bindParam($field, $imgname);
                            break;
                        }
                        default:
                            $newProductQ->bindParam($field, $_POST[$field]);
                            break;
                    }
                }
                
                $newProductQ->execute();
                $selectIDQ = $pdo->query("SELECT id FROM product ORDER BY id DESC");
                $id = $selectIDQ->fetch()[0];

                switch($category){
                    case 1:{
                        $newIngredientQ = $pdo->prepare("INSERT INTO ingredient(general_info, energy, nutrition, components, weight) VALUES ($id, :energy, :nutrition, :components, :weight)");
                        foreach($ingredient_fields as $field){
                            $newIngredientQ->bindParam($field, $_POST[$field]);
                        }
                        $newIngredientQ->execute();
                        break;
                    }
                    case 2:{
                        $newToolQ = $pdo->prepare("INSERT INTO tool(general_info, material) VALUES($id, :material)");
                        foreach($tool_fields as $field){
                            $newToolQ->bindParam($field, $_POST[$field]);
                        }
                        $newToolQ->execute();
                        break;
                    }
                }
                break;
            }
            case 'addToBasket': {
                include_once "models/ingredient.php";
                include_once "models/tool.php";
                include_once "models/basket.php";
                $basket = unserialize($_SESSION['basket']);
                $getProductInfoQ = $pdo->prepare("SELECT name, category, description, producer, country, price, quantity, image, tool.material, ingredient.energy, ingredient.nutrition, ingredient.components, ingredient.weight FROM product LEFT JOIN ingredient ON ingredient.general_info = :id LEFT JOIN tool ON tool.general_info = :id WHERE product.id = :id");
                $getProductInfoQ->bindParam('id', $_GET['id']);
                $getProductInfoQ->execute();
                $product_info = $getProductInfoQ->fetch();
                $product = null;
                switch ($product_info['category']) {
                    case 1:{
                        $product = new Ingredient($_GET['id'],
                        $product_info['category'],
                        $product_info['name'],
                        $product_info['producer'],
                        $product_info['country'],
                        $product_info['price'],
                        explode(',', $product_info['nutrition']),
                        $product_info['energy'],
                        $product_info['components'],
                        $product_info['weight'],
                        $product_info['quantity'],
                        $product_info['description'],
                        $product_info['image']);
                        break;
                    }
                    case 2:{
                        $product = new Tool($_GET['id'],
                        $product_info['category'],
                        $product_info['name'],
                        $product_info['producer'],
                        $product_info['country'],
                        $product_info['price'],
                        $product_info['material'],
                        $product_info['quantity'],
                        $product_info['description'],
                        $product_info['image']);
                        break;
                    }
                }
                $basket->addItem($product);
                break;
            }
            case 'removeFromBasket': {
                require_once 'models/basket.php';
                $basket = unserialize($_SESSION['basket']);
                $basket->removeItem(preg_replace('/[^0-9_ %\[\]\.\(\)%&-]/s', '', $_GET['id']));
            }
            case 'clearBasket': {
                require_once 'models/basket.php';
                $basket = unserialize($_SESSION['basket']);
                $basket->clear();
            }
            case 'placeOrder': {
                require_once 'models/basket.php';
                require_once 'models/order.php';
                require_once 'models/ingredient.php';
                require_once 'models/tool.php';
                require_once "models/user.php";
                $basket = unserialize($_SESSION['basket']);
                $basket->clear();

                $products = $basket->getItems();
                $user = unserialize($_SESSION['user']);

                $order = new Order($user->getID(), $products);
                $order->initializeOrder($pdo);
            }
        }
        break;
    }
    case 'users': {
        require_once 'models/user.php';
        if(isset($_SESSION['user']) && $_SESSION['user'] != ''){
            $user = unserialize($_SESSION['user']);
            switch($command){
                case 'logout':{
                    $user->logout();
                    echo $_SESSION['user'];
                    break;
                }
            }
            break;
        }
    }
}