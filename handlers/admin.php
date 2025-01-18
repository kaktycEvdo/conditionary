<?php
class AdminPage extends Page{
    public function __construct() {
        $this->page_name = 'admin';
        
        if(!isset($_SESSION['user']) && $_SESSION['user'] == ''){
            Page::redirect("./$this->dir");
        }
    }
}

$current_page = new AdminPage();

ServerModal::staticThrowModal('Example modal', false);