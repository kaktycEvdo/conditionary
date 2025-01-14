<?php
include_once "models/user.php";

class RegPage extends Page{
    public function __construct() {
        $this->page_name = 'reg';
    }
}

$current_page = new RegPage();

if(sizeof($_POST) > 0){
    if((!isset($_POST['name']) || $_POST['name'] == '')
        || (!isset($_POST['password']) || $_POST['password'] == '')
        || (!isset($_POST['email']) || $_POST['email'] == '')){
            ServerModal::staticThrowModal('Ошибка: пустые поля при регистрации', true, 'reg');
            die;
        }
    $user = new User();
    $user->register($pdo, $_POST['email'], $_POST['password'], $_POST['name']);
    die;
}