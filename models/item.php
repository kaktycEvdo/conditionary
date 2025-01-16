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

    public function getName(){

    }
    public function setName(){
        
    }
    public function getDescription(){

    }
    public function setDescription(){
        
    }
    public function getProducer(){

    }
    public function setProducer(){
        
    }
    public function getPrice(){

    }
    public function setPrice(){
        
    }

    public function getID(){

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