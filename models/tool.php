<?php
include_once "item.php";
/**
 * Tool class.
 * @var string $material Материал инструмента
 */
class Tool extends Item{
    private string $material;

    public function __construct(int $id, int $category, string $name, string $producer,
    int $country, int $price, string $material, int $quantity, string $description = null, string $image = 'default.jpg') {
        $this->id = $id;
        $this->category = $category;
        $this->name = $name;
        $this->description = $description;
        $this->producer = $producer;
        $this->country = $country;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->material = $material;
        $this->image = $image;
    }

    public function getMaterial(){
        return $this->material;
    }
    public function setMaterial($material){
        $this->material = $material;
    }

    public function draw(){
        $country = $this->countryByNumber($this->country);

        return "<div class='card' style='width: 18rem;'>
                    <img src='static/img/products/$this->image' class='card-img-top' alt='...'>
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
                        <a href='#' class='card-link btn btn-outline-warning $this->id'>Добавить в корзину</a>
                        <!-- <a href='#' class='card-link'>Another link</a> -->
                    </div>
                </div>";
    }
    public function drawFull($id){
        $country = $this->countryByNumber($this->country);

        return "<div class='card' style='width: 18rem;'>
                    <img src='static/img/products/$this->image' class='card-img-top' alt='...'>
                    <div class='card-body'>
                        <a class='card-title' href='product?id=$this->id'>$this->name</a>
                        <p class='card-text'>Производитель: $this->producer <a class='badge text-bg-success'>$this->price ₽</a></p>
                    </div>
                    <ul class='list-group list-group-flush'>
                        <li class='list-group-item'>Материал: $this->material</li>
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
        include_once "views/components/tool_table.php";
    }
}