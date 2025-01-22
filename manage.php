<?php
include_once 'connect_to_db.php';
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
                            ServerModal::staticThrowModal('Ошибка в информации товара', true);
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
                echo "<div>";
                var_dump($_FILES);
                echo "</div>";
                break;
            }
        }
        break;
    }
}