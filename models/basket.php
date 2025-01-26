<?php
class Basket{
    protected array $items;
    public function addItem($item){
        array_push($this->items, $item);
        $this->save();
    }
    public function getItems(){
        return $this->items;
    }
    public function getItemsAmount(){
        return count($this->items);
    }
    public function save(){
        Session::set('basket', serialize($this));
    }
    public function clear(){
        $this->items = [];
        $this->save();
    }
}