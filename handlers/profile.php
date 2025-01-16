<?php

class ProfilePage extends Page{
    public function __construct() {
        $this->page_name = 'profile';
    }
}

$current_page = new ProfilePage();