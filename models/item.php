<?php
include_once "model.php";
class Item extends Model{
    protected $name;
    protected $category;
    protected $description;
    protected $producer;
    protected $country;
    protected $price;
    protected $quantity;
    protected $image;

    public function getName(){
        return $this->name;
    }
    public function setName(){
        
    }
    public function getDescription(){
        return $this->description;
    }
    public function setDescription(){
        
    }
    public function getProducer(){
        return $this->producer;
    }
    public function setProducer(){
        
    }
    public function getCountry(){
        return $this->countryByNumber($this->country);
    }
    public function getPrice(){
        return $this->price;
    }
    public function setPrice(){
        
    }
    public function getImage(){
        return $this->image;
    }
    public function setImage($image){
        $this->image = $image;
    }

    public function getID(){
        return $this->id;
    }

    public function countryByNumber($number){
        switch($number){
            case 7:
                return 'Россия';
            case 33:
                return 'Франция';
            case 41:
                return 'Швейцария';
            default:
                return 'Неизвестная страна';
        }
    }
}