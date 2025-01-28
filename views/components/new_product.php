<style>
    div.row.hidden{
        display: none !important;
    }
</style>
<form enctype="multipart/form-data" method="POST" class="container d-grid gap-2" id="newProductForm">
    <div class="row">
        <label for="name">Название продукта</label>
        <input id="name" required name="name" type="text">
    </div>
    <div class="row">
        <label for="description">Описание продукта</label>
        <textarea name="description" id="description"></textarea>
    </div>
    <div class="row">
        <label>Категория продукта</label>
        <div>
            <input required class="form-check-input" type="radio" name="category" value="1" id="ingredient" checked>
            <label class="form-check-label" for="ingredient">
                Ингредиент
            </label>
            <input required class="form-check-input" type="radio" name="category" value="2" id="tool">
            <label class="form-check-label" for="tool">
                Инструмент
            </label>
        </div>
    </div>
    <div class="row ingredient-field">
        <label for="energy">Энергетическая ценность (ККал)</label>
        <input type="number" id="energy" name="energy">
    </div>
    <div class="row ingredient-field">
        <label for="nutrition">Пищевая ценность (Б,Ж,У)</label>
        <input type="text" id="nutrition" name="nutrition">
    </div>
    <div class="row ingredient-field">
        <label for="components">Состав</label>
        <textarea name="components" id="components"></textarea>
    </div>
    <div class="row ingredient-field">
        <label for="weight">Вес (гр)</label>
        <input type="number" id="weight" name="weight">
    </div>
    <div class="row tool-field hidden">
        <label for="material">Материал</label>
        <input type="number" id="material" name="material">
    </div>
    <div class="row">
        <label for="producer">Производитель</label>
        <input required type="text" id="producer" name="producer">
    </div>
    <div class="row">
        <label for="country">Код страны-производителя</label>
        <select name="country" id="country" class="form-select">
            <option value="0" selected>Неизвестная страна (0)</option>
            <option value="7">Россия (7)</option>
            <option value="33">Франция (33)</option>
            <option value="41">Швейцария (41)</option>
        </select>
    </div>
    <div class="row">
        <label for="price">Цена</label>
        <input required type="number" id="price" name="price">
    </div>
    <div class="row">
        <label for="quantity">Количество доступно</label>
        <input required type="number" id="quantity" name="quantity">
    </div>
    <div class="row">
        <label for="image">Изображение</label>
        <input required type="file" name="image" class="form-control" id="image">
    </div>
</form>
<div class="container">
<button id="newProductBtn" class="btn btn-success" onclick="sendPostProduct()">Создать</button>
</div>