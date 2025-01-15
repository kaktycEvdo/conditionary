<?php
session_start();
require 'connect_to_db.php';

// url nesting. example: localhost/index, localhost/site/index. counts from 0.
$nesting = 1;

$url = explode('?', $_SERVER['REQUEST_URI'])[0];
$dir = '/'.explode('/', $url)[$nesting];
$url = str_replace($dir, '',  $url);


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

    public function __construct(string $page_name) {
        $this->page_name = $page_name;
    }

    public function setPageName(string $name){
        $this->page_name = $name;
    }
    public function getPageName(){
        echo $this->page_name;
    }

    public function draw($url, $pages_names, $pages_titles, $dir){
        include_once 'views/components/header.php';

        include_once "views/$this->page_name.php";

        include_once 'views/components/footer.php';
    }

    public static function redirect($location){
        header("Location: $location");
    }
}

class ServerModal{
    private $message;
    private $type;
    public $thrown;

    public function __construct() {
        $this->thrown = false;
    }

    private function changeMessage(string $message){
        $this->message = $message;
    }
    private function changeType(string $type){
        $this->type = $type;
    }

    public function changeModal(string $message, bool $error = false){
        $this->changeMessage($message);
        $this->changeType($error);
    }
    public function closeModal(){
        $this->thrown = false;
    }
    public function throwModal(string $message, bool $error = false, string $location = null){
        $this->changeModal($message, $error);
        $this->thrown = true;
        $modal = $this;
        $_SESSION['response'] = serialize($modal);
        if($location){
            header("Location: $location");
        }
    }
    public static function staticThrowModal(string $message, bool $error, string $location = null){
        switch($error){
            case false:
                /*
                    <div class="modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog" id="modalChoice">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content rounded-3 shadow">
                            <div class="modal-body p-4 text-center">
                                <h5 class="mb-0">Enable this setting?</h5>
                                <p class="mb-0">You can always change your mind in your account settings.</p>
                            </div>
                            <div class="modal-footer flex-nowrap p-0">
                                <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 border-end"><strong>Yes, enable</strong></button>
                                <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0" data-bs-dismiss="modal">No thanks</button>
                            </div>
                            </div>
                        </div>
                    </div>
                */
                echo '<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                вот это в ушах свистит конечно вообще неожиданно
                            </div>
                        </div>
                    </div>';
                break;
            case true:
                echo "<div class='modal merror'>$message</div>";
                break;
        }
        if($location){
            Page::redirect($location);
        }
    }
    public function printMessage(){
        switch($this->type){
            case false:
                echo "<div class='modal msuccess'>$this->message</div>";
                break;
            case true:
                echo "<div class='modal merror'>$this->message</div>";
                break;
        }
    }
}

$pages_names = [
    '/',
    '/auth',
    '/catalogue',
    '/order',
    '/orders',
    '/reg'
];
$pages_titles = [
    'Главная',
    'Авторизация',
    'Каталог',
    'Заказ',
    'Заказы',
    'Регистрация',
];

$current_page = null;

if(array_search($url, $pages_names, true) !== false){
    switch ($url){
        case '/':
            require_once 'handlers/index.php';
            break;
        default:
            require_once "handlers/$url.php";
            break;
    }
}
else{
    require_once "views/404.html";
}

if($current_page == null){
    $current_page = $url == '/' ? new Page('index') : new Page(explode('/', $url)[1]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/css/bootstrap.min.css">
    <link rel="stylesheet" href="static/styles.css">
</head>
<body class="vh-100 vw-100 d-grid" style="grid-template-rows: max-content auto">
    <?php $current_page->draw($url, $pages_names, $pages_titles, $dir); ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="static/js/bootstrap.min.js"></script>
</body>
</html>