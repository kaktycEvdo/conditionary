<?php

?>

<div class="container d-grid vw-100">
    <div class="row w-100 d-grid" style="grid-auto-flow: column;">
        <div class="filters p-3 border-black">
            <form class="accordion">
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
                            <div id="price_range">
                                Максимальная цена: <?php echo $this->highest_price; ?>₽
                            </div>
                            <input type="range" min="<?php echo $this->lowest_price ?>" max="<?php echo $this->highest_price ?>" name="price" id="price" value="<?php echo $this->highest_price ?>">

                            <script>
                                let range = document.getElementById('price');
                                range.addEventListener('change', e => {
                                    let text = document.getElementById('price_range');
                                    text.innerHTML = "Максимальная цена: "+( e.target.value)+"₽";
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div>
                    <input type="submit" class="btn btn-outline-success" value="Применить">
                </div>
            </form>
        </div>
        <div class="catalogue d-grid p-2" style="height: fit-content;">
            <div class="row gap-3">
                <?php
                if(sizeof($this->ingredients)+sizeof($this->tools) > 0){
                    foreach($this->ingredients as $ingredient){
                        echo $ingredient->draw();
                    };
                    foreach($this->tools as $tool){
                        echo $tool->draw();
                    };
                }
                else{
                    echo "Не было найдено товаров";
                }
                ?>
            </div>
        </div>
    </div>
    <div class="pages d-flex justify-content-center align-items-center gap-3">
        <?php
            for($i = 0; $i <= $this->pages; $i++){
                echo "<a class='pagination_btn btn btn-outline-info'>".($i+1)."</a>";
            }
        ?>
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

    if(location.href.includes('?')){
        if(!location.href.includes('&pageid=') && !location.href.includes('?pageid=')){
            const pagination_btns =document.querySelectorAll(".pagination_btn");
            pagination_btns.forEach(btn => {
                btn.addEventListener("click", (e) => {
                    window.location.href = location.href+"&pageid="+e.target.innerHTML;
                })
            });
        }
        else{
            const pagination_btns = document.querySelectorAll(".pagination_btn");
            pagination_btns.forEach(btn => {
                btn.addEventListener("click", (e) => {
                    let locationOfThing = 0;
                    if(location.href.includes('&pageid=')) locationOfThing = location.href.search('&pageid=');
                    else if (location.href.includes('?pageid=')) locationOfThing = location.href.search('\\\?pageid=');
                    
                    let thing = location.href.replace(location.href.substring(locationOfThing+1), "pageid="+e.target.innerHTML);
                    window.location.href = thing;
                })
            });
        }
    }
    else{
        const pagination_btns =document.querySelectorAll(".pagination_btn");
        pagination_btns.forEach(btn => {
            btn.addEventListener("click", (e) => {
                window.location.href = location.href+"?pageid="+e.target.innerHTML;
            })
        });
    }
</script>