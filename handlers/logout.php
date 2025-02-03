<?php
class LogoutPage extends Page{
    public function __construct() {
        $this->page_name = 'logout';
        
        if(!isset($_SESSION['user']) || $_SESSION['user'] == '') Page::redirect('auth');
    }
}

$current_page = new LogoutPage();