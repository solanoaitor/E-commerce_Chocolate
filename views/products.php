<?php //Vista dels productes ?>
<ul class="products" id="guitar">
    <?php
    foreach($products as $prod){ ?>
        <li>
            <?php echo "<a class='ptarget' data-custom-value={$prod['id']} href='#'>"; ?>
            <?php echo "<img src= 'img/products/{$prod['id_categoria']}/{$prod['id']}.jpg' >"; ?>
            <h4 class="productName"><?php echo "{$prod['nom']}"; ?></h4>
            <p class="productDesc"><?php echo "{$prod['descripcio']}"; ?></p>
            <p class="price"><?php echo "{$prod['preu']} €"; ?></p>
            </a>
        </li>
    <?php } ?>
</ul>