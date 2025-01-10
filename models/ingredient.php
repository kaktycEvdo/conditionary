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
}