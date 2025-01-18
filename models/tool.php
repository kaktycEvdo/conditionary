<?php
include_once "item.php";
/**
 * Tool class.
 * @var string $material Материал инструмента
 */
class Tool extends Item{
    private string $material;

    public function __construct(int $id, int $category, string $name, string $producer,
    int $country, int $price, string $material, int $quantity, string $description = null) {
        $this->id = $id;
        $this->category = $category;
        $this->name = $name;
        $this->description = $description;
        $this->producer = $producer;
        $this->country = $country;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->material = $material;
    }

    public function getMaterial(){

    }
    public function setMaterial(){
        
    }

    public function draw(){
        $country = $this->countryByNumber($this->country);

        return "<div class='card' style='width: 18rem;'>
                    <img src='static/img/palette.jpg' class='card-img-top' alt='...'>
                    <div class='card-body'>
                        <a class='card-title' href='product?id=$this->id'>$this->name</a>
                        <p class='card-text'>$this->producer <a class='badge text-bg-success'>$this->price ₽</a></p>
                    </div>
                    <ul class='list-group list-group-flush'>
                        <li class='list-group-item'>$this->material</li>
                        <li class='list-group-item'>$country</li>
                        <li class='list-group-item'>$this->quantity шт осталось</li>
                    </ul>
                    <div class='card-body text-center'>
                        <a href='#' class='card-link btn btn-outline-warning'>Добавить в корзину</a>
                        <!-- <a href='#' class='card-link'>Another link</a> -->
                    </div>
                </div>";
    }
}