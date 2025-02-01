<?php
if (!isset($_SESSION['user']) || $_SESSION['user'] == '') {
    ServerModal::staticThrowModal('Ошибка 405: Недостаточно прав', true, 'auth');
}
$user = unserialize(Session::get('user'));
?>
<div class="container">
    <div class="row p-4">
        <div class="col-4 container d-grid gap-2">
            <div class="row">
                <h3>Данные пользователя</h3>
            </div>
            <div class="row">
                <p class="col">Имя пользователя</p>
                <p class="col">Электронная почта</p>
            </div>
            <div class="row">
                <p class="col"><?php echo $user->getName() ?></p>
                <p class="col"><?php echo $user->getEmail(true) ?></p>
            </div>
            <div class="row">
                <button class="btn btn-outline-warning">
                    Изменить
                </button>
            </div>
            <div class="row">
                <a class="btn btn-outline-danger" href="logout">
                    Выйти
                </a>
            </div>
        </div>
        <div class="col-auto container d-grid gap-2">
            <div class="row">
                <h3>Здесь будут заказы</h3>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5 d-none" tabindex="-1" role="dialog"
    id="modalSignin">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <h1 class="fw-bold mb-0 fs-2">Изменение пользователя</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-5 pt-0">
                <form class="" method="POST" >
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control rounded-3" id="floatingInput"
                            name="email" placeholder="name@example.com" value="<?php $user->getEmail() ?>">
                        <label for="floatingInput">Электронная почта</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-3" id="floatingNameInput"
                            name="name" placeholder="name@example.com" value="<?php $user->getEmail() ?>">
                        <label for="floatingInput">Электронная почта</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control rounded-3" id="floatingPassword"
                            name="password" placeholder="Password">
                        <label for="floatingPassword">Пароль</label>
                    </div>
                    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-success" type="submit">Изменить</button>
                </form>
            </div>
        </div>
    </div>
</div>