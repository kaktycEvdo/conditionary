<main class="d-flex align-items-center py-4 bg-body-tertiary h-100">
    <form method="POST" class="w-25 m-auto">
        <h1 class="h3 mb-3 fw-normal">Регистрация</h1>

        <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
            <label for="floatingInput">Электронная почта</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" id="floatingNameInput" name="name" placeholder="John_Doe23">
            <label for="floatingNameInput">Имя пользователя</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
            <label for="floatingPassword">Пароль</label>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Зарегистрироваться</button>
    </form>
</main>