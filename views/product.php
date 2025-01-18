<div class="container">
    <div class="row">
        <div class="col w-25">
            <img src="static/img/chocolate.jpg" alt="placeholder" class="w-100">
        </div>
        <!-- возможно это перестанет быть актуальным позже -->
        <div class="col">
            <?php
                echo $this->product->drawTable();
            ?>
        </div>
    </div>
</div>