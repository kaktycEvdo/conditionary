<?php
require_once 'models/ingredient.php';
require_once 'models/tool.php';

class CataloguePage extends Page
{
    public array $ingredients;
    public array $tools;
    public int $highest_price;

    public function __construct(PDO $pdo)
    {
        $this->page_name = 'catalogue';

        // $id == 1 => $posts[0:$limit]; $id == 2 => $posts[$limit:$limit*2]
        $page_id = 1;
        $limit = 9;
        if (isset($_GET['pageid'])) {
            $page_id = $_GET['pageid'];
        }
        if (isset($_GET['limit'])) {
            if ($_GET['limit'] == 'all') {
                // dunno change later
                $limit = 99999;
            } else {
                $limit = $_GET['limit'];
            }
        }

        $temp = ($page_id - 1) * $limit;

        $priceFilter = 100000000000;
        if (isset($_GET['price']))
            $priceFilter = htmlspecialchars($_GET['price']);
        $categoryFilter = "1 || 2";
        if (isset($_GET['category']))
            $categoryFilter = htmlspecialchars($_GET['category']);

        $getProductsQ = $pdo->query("SELECT id, category, name, producer, country, price, quantity, description, image FROM product WHERE price <= $priceFilter and category = $categoryFilter ORDER BY name DESC", PDO::FETCH_ASSOC);
        $products = $getProductsQ->fetchAll();

        $this->pages = round(sizeof($products) / $limit);

        $ingredients = [];
        $tools = [];

        $highest_price = 0;
        $counter = 0;

        foreach ($products as $product_data) {
            if ($product_data['price'] > $highest_price)
                $highest_price = $product_data['price'];
            // вообще не оптимизированная вещь
            $counter++;
            if($counter <= $temp)
                continue;
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
        $this->ingredients = $ingredients;
        $this->tools = $tools;

        $this->highest_price = $highest_price;
    }
}

$current_page = new CataloguePage($pdo);