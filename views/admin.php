<script src="static/scripts.js"></script>
<style>
    div#loading.hidden {
        display: none !important;
    }
</style>
<div id="loading"
    class="hidden d-flex position-absolute text-center justify-content-center align-items-center w-100 h-100">
    Загрузка...
</div>
<div class="row w-100">
    <div class="flex-shrink-0 p-3 col-2" style="width: 280px;">
        <a href="/" class="d-flex align-items-center pb-3 mb-3 link-body-emphasis text-decoration-none border-bottom">
            <svg class="bi pe-none me-2" width="30" height="24">
                <use xlink:href="#bootstrap"></use>
            </svg>
            <span class="fs-5 fw-semibold">Админ-панель</span>
        </a>
        <ul class="list-unstyled ps-0">
            <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                    data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                    Продукты
                </button>
                <div class="collapse show" id="home-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="#"
                                class="link-body-emphasis d-inline-flex text-decoration-none rounded"
                                onclick="dofetching('products', 'newForm')">Создать</a>
                        </li>
                        <li><a href="#"
                                class="link-body-emphasis d-inline-flex text-decoration-none rounded"
                                onclick="dofetching('products', 'updateForm')">Изменить</a>
                        </li>
                        <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded"
                                onclick="dofetching('products', 'getAll')">Все</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                    data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                    Заказы
                </button>
                <div class="collapse" id="orders-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="#"
                                class="link-body-emphasis d-inline-flex text-decoration-none rounded">Создать</a></li>
                        <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Все</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="border-top my-3"></li>
            <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                    data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                    Профили
                </button>
                <div class="collapse" id="account-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="#"
                                class="link-body-emphasis d-inline-flex text-decoration-none rounded">Создать</a>
                        </li>
                        <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Все</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    <main class="container col-auto">
        <div id="content_container">

        </div>
    </main>
</div>