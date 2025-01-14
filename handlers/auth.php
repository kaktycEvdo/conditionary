<?php
include_once "models/user.php";

class AuthPage extends Page{
    public function __construct() {
        $this->page_name = 'auth';
    }
}

$current_page = new AuthPage();

if(sizeof($_POST) > 0){
    if((!isset($_POST['password']) || $_POST['password'] == '')
        || (!isset($_POST['email']) || $_POST['email'] == '')){
            ServerModal::staticThrowModal('Ошибка: пустые поля при авторизации', true, 'auth');
            die;
        }
    $user = new User();
    $user->authorize($pdo, $_POST['email'], $_POST['password']);
    die;
}