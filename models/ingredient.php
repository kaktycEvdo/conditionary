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
    int $country, int $price, array $nutrition, int $energy, string $components, int $weight, int $quantity, string $description = null) {
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
    }

    public function draw(){
        return "<div class='card' style='width: 18rem;'>
                    <img src='static/img/chocolate.jpg' class='card-img-top' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>$this->name</h5>
                        <p class='card-text'>$this->producer <a class='badge text-bg-success'>$this->price ₽</a></p>
                    </div>
                    <ul class='list-group list-group-flush'>
                        <li class='list-group-item'>$this->energy ККал</li>
                        <li class='list-group-item'>$this->weight гр</li>
                        <li class='list-group-item'>$this->quantity шт осталось</li>
                    </ul>
                    <div class='card-body text-center'>
                        <a href='#' class='card-link btn btn-outline-warning'>Добавить в корзину</a>
                        <!-- <a href='#' class='card-link'>Another link</a> -->
                    </div>
                </div>";
    }
}