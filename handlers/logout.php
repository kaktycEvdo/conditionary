<?php
session_start();

class LogoutPage extends Page{
    public function __construct() {
        $this->page_name = 'logout';

        var_dump($_SESSION['user']);
        
        if(!isset($_SESSION['user']) || $_SESSION['user'] == '') Page::redirect('auth');
    }
}

$current_page = new LogoutPage();