<?php
    // сделать тут 3 страницы в одной: корзина, подтверждение заказа, просмотр уже подтвержденного заказа (если имеется id в get)
?>

<?php

?>

<div class="container">
    <div class="row">
        <div class="order col col-6 d-grid h-fit p-3" style="height: fit-content">
            <div class="row gap-3">
                <?php
                foreach($this->products as $key => $product){
                    echo $product->drawFull($key);
                };
                ?>
            </div>
        </div>
        <div class="place_order col col-auto d-grid h-fit p-2" style="height: fit-content">
            <div class="row-1">
                <h3>Управление</h3>
                <div class="col p-2">
                    <a href='#' class='card-link btn btn-outline-success'>Оставить заказ</a>
                </div>
                <div class="col p-2">
                    <a href='#' class='card-link btn btn-outline-danger'>Очистить корзину</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="debug_container">

</div>
<script>
    const buttons = document.querySelectorAll(".card-link.btn");
    buttons.forEach(button => {
        button.addEventListener("click", (e) => {
            removeFromBasket(e);
        });
    });
</script>