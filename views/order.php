<?php
    // сделать тут 3 страницы в одной: корзина, подтверждение заказа, просмотр уже подтвержденного заказа (если имеется id в get)
    $fullPrice = 0;
    $amount = 0;
?>

<div class="container">
    <div class="row">
        <div class="order col col-6 d-grid h-fit p-3" style="height: fit-content">
            <div class="row gap-3">
                <?php
                if($this->products){
                    foreach($this->products as $key => $product){
                        $fullPrice+=$product->getPrice();
                        $amount=$key;
                        echo $product->drawFull($key);
                    }
                    $amount++;
                }
                else{
                    echo "Товаров нет :(";
                }
                ?>
            </div>
        </div>
        <div class="place_order col col-auto d-grid h-fit p-2" style="height: fit-content">
            <div class="row-1">
                <h3>Данные</h3>
                <div class="col p-2">
                    <div>
                        Общая цена: <?php echo "$fullPrice ₽"; ?>
                    </div>
                    <div>
                        Товаров: <?php echo $amount; ?>
                    </div>
                </div>
                <h3>Управление</h3>
                <div class="col p-2">
                    <a href='#' id="orderBtn" class='btn btn-outline-success'>Оставить заказ</a>
                </div>
                <div class="col p-2">
                    <a href='#' id="clearBtn" class='btn btn-outline-danger'>Очистить корзину</a>
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
    const orderBtn = document.querySelector("#orderBtn");
    const clearBtn = document.querySelector("#clearBtn");
    orderBtn.addEventListener('click', () => {
        placeOrder();
    });
    clearBtn.addEventListener('click', () => {
        clearBasket();
    });
</script>