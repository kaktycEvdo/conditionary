<?php
require_once 'models/ingredient.php';
require_once 'models/tool.php';
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
                            Accordion Item #2
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <strong>This is the second item's accordion body.</strong> It is hidden by default, until
                            the
                            collapse plugin adds the appropriate classes that we use to style each element. These
                            classes
                            control the overall appearance, as well as the showing and hiding via CSS transitions. You
                            can
                            modify any of this with custom CSS or overriding our default variables. It's also worth
                            noting
                            that
                            just about any HTML can go within the <code>.accordion-body</code>, though the transition
                            does
                            limit
                            overflow.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseThree">
                            Accordion Item #3
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <strong>This is the third item's accordion body.</strong> It is hidden by default, until the
                            collapse plugin adds the appropriate classes that we use to style each element. These
                            classes
                            control the overall appearance, as well as the showing and hiding via CSS transitions. You
                            can
                            modify any of this with custom CSS or overriding our default variables. It's also worth
                            noting
                            that
                            just about any HTML can go within the <code>.accordion-body</code>, though the transition
                            does
                            limit
                            overflow.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="catalogue col col-auto d-grid h-fit p-5" style="height: fit-content">
            <div class="row">
                <div class="card" style="width: 18rem;">
                    <img src="static/img/palette.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Паллета для шоколада</h5>
                        <p class="card-text">VTK PRO 510 <a class="badge text-bg-success">300р</a></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Нержавеющая сталь</li>
                        <li class="list-group-item">Россия</li>
                    </ul>
                    <div class="card-body text-center">
                        <a href="#" class="card-link btn btn-outline-warning">Добавить в корзину</a>
                        <!-- <a href="#" class="card-link">Another link</a> -->
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img src="static/img/chocolate.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Шоколад молочный</h5>
                        <p class="card-text">Barry Callebaut <a class="badge text-bg-success">1300р</a></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">33,6%</li>
                        <li class="list-group-item">500гр</li>
                    </ul>
                    <div class="card-body text-center">
                        <a href="#" class="card-link btn btn-outline-warning">Добавить в корзину</a>
                        <!-- <a href="#" class="card-link">Another link</a> -->
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img src="static/img/salt.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Цветочная соль</h5>
                        <p class="card-text">Fleur de sel Eurovanille <a class="badge text-bg-success">150р</a></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">30гр бутылочка</li>
                        <li class="list-group-item">Франция</li>
                    </ul>
                    <div class="card-body text-center">
                        <a href="#" class="card-link btn btn-outline-warning">Добавить в корзину</a>
                        <!-- <a href="#" class="card-link">Another link</a> -->
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>