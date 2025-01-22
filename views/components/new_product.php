<form enctype="multipart/form-data" method="POST" class="container d-grid gap-2" id="newProductForm">
    <div class="row">
        <label for="name">Название продукта</label>
        <input id="name" name="name" type="text">
    </div>
    <div class="row">
        <label for="description">Описание продукта</label>
        <textarea name="description" id="description"></textarea>
    </div>
    <div class="row">
        <label>Категория продукта</label>
        <div>
            <input class="form-check-input" type="radio" name="category" value="1" id="ingredient" checked>
            <label class="form-check-label" for="ingredient">
                Ингредиент
            </label>
            <input class="form-check-input" type="radio" name="category" value="2" id="tool">
            <label class="form-check-label" for="tool">
                Инструмент
            </label>
        </div>
    </div>
    <div class="row">
        <label for="producer">Производитель</label>
        <input type="text" id="producer" name="producer">
    </div>
    <div class="row">
        <label for="country">Код страны-производителя</label>
        <input type="number" id="country" name="country">
    </div>
    <div class="row">
        <label for="price">Цена</label>
        <input type="number" id="price" name="price">
    </div>
    <div class="row">
        <label for="quantity">Количество доступно</label>
        <input type="number" id="quantity" name="quantity">
    </div>
    <div class="row">
        <label for="image">Изображение</label>
        <div class="input-group mb-3">
            <label class="input-group-text" for="image">Загрузить</label>
            <input type="file" name="image" class="form-control" id="image">
        </div>
    </div>
</form>
<div class="container">
<button id="newProductBtn" class="btn btn-success" onclick="sendPostProduct()">Создать</button>
</div>