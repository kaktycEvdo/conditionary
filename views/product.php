<div class="container">
    <div class="row">
        <div class="col w-25">
            <img src="static/img/products/<?php echo $this->product->getImage(); ?>" alt="placeholder" class="w-100">
        </div>
        <!-- возможно это перестанет быть актуальным позже -->
        <div class="col">
            <?php
                echo $this->product->drawTable();
            ?>
        </div>
    </div>
</div>