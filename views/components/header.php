<?php
include_once 'models/user.php';
$user = Session::get('user') ? unserialize(Session::get('user')) : null;
?>
<header class="p-3 text-bg-dark">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <img src="static/icon.svg">
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <?php
                $blacklist = ['/order', '/orders', '/auth', '/reg'];

                for($i = 0; $i < sizeof($pages_names); $i++){
                    if(array_search($pages_names[$i], $blacklist) || $blacklist[0] == $pages_names[$i]){
                        continue;
                    }
                    if($pages_names[$i] == $url){
                        echo "<li><a href='$dir".$pages_names[$i]."' class='nav-link px-2 text-secondary disabled'>".$pages_titles[$i]."</a></li>";
                    }
                    else if ($url != '/' && $pages_names[$i] == ''){
                        echo "<li><a href='../$dir' class='nav-link px-2 text-white'>".$pages_titles[$i]."</a></li>";
                    }
                    else{
                        echo "<li><a href='$dir".$pages_names[$i]."' class='nav-link px-2 text-white'>".$pages_titles[$i]."</a></li>";
                    }
                }
                ?>
            </ul>

            <?php if($url == '/catalogue'){ ?>
            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..."
                    aria-label="Search">
            </form>
            <?php } ?>

            <div class="text-end">
                <?php if($user == null){ ?>
                <a href="auth" class="btn btn-outline-light me-2">Авторизоваться</a>
                <a href="reg" class="btn btn-warning">Зарегистрироваться</a>
                <?php }
                else{
                    $name = $user->getName();
                    echo "<a href='profile' class='text-warning'>$name</a>";
                }
                ?>
            </div>
        </div>
    </div>
</header>