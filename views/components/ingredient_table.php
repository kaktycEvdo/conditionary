<div class="container gap-3 d-grid">
    <div class="row">
        <div class="col">
            Название продукта:
        </div>
        <div class="col">
            <?php echo $this->name; ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            Производитель:
        </div>
        <div class="col">
            <?php echo $this->producer; ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            Сделано в стране:
        </div>
        <div class="col">
            <?php echo $this->getCountry(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            Описание товара:
        </div>
        <div class="col">
            <?php echo $this->description; ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            Осталось на складе:
        </div>
        <div class="col">
            <?php echo $this->quantity; ?>шт.
        </div>
    </div>
    <div class="row">
        <div class="col">
            Энергетическая ценность:
        </div>
        <div class="col">
            <?php echo $this->energy; ?>ККал
        </div>
    </div>
    <div class="row">
        <div class="col">
            Пищевая ценность (Б,Ж,У):
        </div>
        <div class="col">
            <?php echo implode(', ', $this->nutrition); ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            Вес:
        </div>
        <div class="col">
            <?php echo $this->weight; ?>гр
        </div>
    </div>
    <div class="row">
        <div class="col">
            Состав:
        </div>
        <div class="col">
            <?php echo $this->components; ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
        <button class="btn btn-outline-success a <?php echo $this->id; ?>">Добавить в корзину</button>
        </div>
    </div>
</div>
<script>
    let button = document.querySelector('.btn.btn-outline-success');
    button.addEventListener('click', e => {
        addToBasket(e);
    })
</script>