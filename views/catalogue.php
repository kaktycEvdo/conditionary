<?php

?>

<div class="container d-grid vw-100">
    <div class="row w-100 d-grid" style="grid-auto-flow: column;">
        <div class="filters p-3 border-black">
            <div class="accordion">
                <h4 class="text-center">Фильтры</h4>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                            aria-controls="panelsStayOpen-collapseOne">
                            Категория
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <div>
                                <input type="radio" name="category" id="ingredient" value="1">
                                <label for="ingredient">Ингредиент</label>
                            </div>
                            <div>
                                <input type="radio" name="category" id="tool" value="2">
                                <label for="tool">Инструмент</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseTwo">
                            По цене
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            
                            <input type="range" name="price" id="price">
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <button class="btn btn-outline-success">Применить</button>
            </div>
        </div>
        <div class="catalogue d-grid h-fit p-2" style="height: fit-content">
            <div class="row gap-3">
                <?php
                foreach($this->ingredients as $ingredient){
                    echo $ingredient->draw();
                };
                foreach($this->tools as $tool){
                    echo $tool->draw();
                };
                ?>
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
            addToBasket(e);
        });
    });
</script>