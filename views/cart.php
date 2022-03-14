<?php //Vista inicial de los productos en su contenedor para ajax ?>

<div id="cartDiv">
    <h2>Resum del cabàs</h2>
    <ul class="products">
	    <?php
	    foreach($products as $prod){ ?>
	      <li>
	        <?php echo "<a class='ptarget' data-custom-value={$prod['id']} href='#'>"; ?>
	        <?php echo "<img src= 'img/products/{$prod['id_categoria']}/{$prod['id']}.jpg' >"; ?>
					<h4 class="productName"><?php echo "{$prod['nom']}"; ?></h4>
                    <h4 class="productName">Preu: <?php echo "{$prod['preu']}"; ?> €</h4>
                    <h4 class="productName">Quantitat: <?php echo "{$count[$prod['id']]}" ; ?></h4>
	        </a>
	      </li>
	    <?php } ?>

	</ul>
	<div class="placeOrder">
		<button id="order" class="orderbutton" value="1" type="button">REALITZA COMANDA</button>
        <button id="esborrar" class="orderbutton" value="1" type="button">ESBORRA COMANDA</button>
	</div>
</div>
