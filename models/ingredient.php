<?php
include_once "item.php";
/**
 * Ingredient class.
 * @var array<int> $nutrition Nutrition value, пищевая ценность. Б,Ж,У через запятую.
 * @var int $energy Energy value, энергетическая ценность. ккал.
 * @var string $components Состав. Принимает строку.
 * @var int $weight Вес. Граммы.
 */
class Ingredient extends Item{
    protected $nutrition;
    protected $energy;
    protected $components;
    protected $weight;

    public function __construct(int $id, int $category, string $name, string $producer,
    int $country, int $price, array $nutrition, int $energy, string $components, int $weight, int $quantity, string $description = null, string $image = 'default.jpg') {
        $this->id = $id;
        $this->category = $category;
        $this->name = $name;
        $this->description = $description;
        $this->producer = $producer;
        $this->country = $country;
        $this->price = $price;
        $this->nutrition = $nutrition;
        $this->energy = $energy;
        $this->components = $components;
        $this->quantity = $quantity;
        $this->weight = $weight;
        $this->image = $image;
    }

    public function draw(){
        return "<div class='card' style='width: 18rem;'>
                    <img src='static/img/products/$this->image' class='card-img-top' alt='...'>
                    <div class='card-body'>
                        <a class='card-title' href='product?id=$this->id'>$this->name</a>
                        <p class='card-text'>$this->producer <a class='badge text-bg-success'>$this->price ₽</a></p>
                    </div>
                    <ul class='list-group list-group-flush'>
                        <li class='list-group-item'>$this->energy ККал</li>
                        <li class='list-group-item'>$this->weight гр</li>
                        <li class='list-group-item'>$this->quantity шт осталось</li>
                    </ul>
                    <div class='card-body text-center'>
                        <a href='#' class='card-link btn btn-outline-warning $this->id'>Добавить в корзину</a>
                        <!-- <a href='#' class='card-link'>Another link</a> -->
                    </div>
                </div>";
    }

    public function drawFull($id){
        $country = $this->countryByNumber($this->country);
        $nutrition = implode(',', $this->nutrition);

        return "<div class='card' style='width: 18rem;'>
                    <img src='static/img/products/$this->image' class='card-img-top' alt='...'>
                    <div class='card-body'>
                        <a class='card-title' href='product?id=$this->id'>$this->name</a>
                        <p class='card-text'>$this->producer <a class='badge text-bg-success'>$this->price ₽</a></p>
                    </div>
                    <ul class='list-group list-group-flush'>
                        <li class='list-group-item'>Энергетическая ценность: $this->energy ккал</li>
                        <li class='list-group-item'>Б,Ж,У: $nutrition</li>
                        <li class='list-group-item'>Состав: $this->components</li>
                        <li class='list-group-item'>Вес: $this->weight</li>
                        <li class='list-group-item'>Страна-производитель: $country</li>
                        <li class='list-group-item'>$this->quantity шт осталось</li>
                    </ul>
                    <ul class='list-group list-group-flush'>
                        <li class='list-group-item'>Описание: $this->description</li>
                    </ul>
                    <div class='card-body text-center'>
                        <a href='#' class='card-link btn btn-outline-danger $id'>Удалить из корзины</a>
                    </div>
                </div>";
    }

    public function drawTable(){
        include_once "views/components/ingredient_table.php";
    }
}