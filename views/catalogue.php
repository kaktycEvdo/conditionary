<?php

?>

<div class="d-grid">
    <div class="row">
        <div class="filters col col-2">
            <div class="accordion" id="accordionPanelsStayOpenExample">
                <h4 class="text-center">Фильтры</h4>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                            aria-controls="panelsStayOpen-collapseOne">
                            По цене
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseTwo">
                            Страна-производитель
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseThree">
                            Производитель
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="catalogue col col-auto d-grid h-fit p-2" style="height: fit-content">
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