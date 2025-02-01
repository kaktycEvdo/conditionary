<main class="d-flex align-items-center py-4 bg-body-tertiary h-100">
    <div class="w-25 m-auto">
        <h3 class="text-center">Вы уверены, что хотите выйти?</h3>
        <div class="d-flex align-items-center justify-content-center gap-5">
            <button class="btn btn-outline-danger" id="logout">Да</button>
            <button class="btn btn-outline-success" id="cancel">Отмена</button>
        </div>
    </div>
</main>
<script>
    let logoutbtn = document.getElementById('logout');
    let cancelbtn = document.getElementById('cancel');
    logoutbtn.addEventListener('click', () => {
        logout();
    })
    cancelbtn.addEventListener('click', () => {
        history.back();
    })
</script>