<?php //Vista d'un producte ?>
<div class="product">
    <div class="productImage">
        <?php
        foreach($product as $prod){
        echo "<img src= 'img/products/{$prod['id_categoria']}/{$prod['id']}.jpg' >";
        ?>
    </div>
    <div class="productInfo">
        <h4><?php echo "{$prod['nom']}"; ?></h4>
        <p><?php echo "{$prod['preu']} €"; ?></p>
        <p><?php echo "{$prod['descripcio']}"; ?></p>
        </br>
        <form action="" method="post" id="idForm">
            Quantitat: <input type="number" value="1" name="quantitat">
        </form>

        <?php echo("<button class='cartbutton'  value={$prod['id']} type='button' data-custom-value={$prod['preu']}>Afegeix al cabàs</button>"); }?>
    </div>
</div>

