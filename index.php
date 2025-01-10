<?php
/**
 * Session class mostly for static functions working with $_SESSION global parameter. Has a set and get functions.
 */
class Session{
    public static function set($name, $value){
        $_SESSION[$name] = $value;
    }
    public static function get($name){
        return $_SESSION[$name];
    }
}
class Page{
    protected $page_name;
    public function setPageName(string $name){
        $page_name = $name;
    }

    public function draw(){
        include_once 'views/components/header.php';

        include_once $this->page_name;

        include_once 'views/components/footer.php';
    }

    public static function redirect(){

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
</body>
</html>