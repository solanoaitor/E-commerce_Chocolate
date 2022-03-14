<div class="register">
	<div id="editError">
	</div>

	<form id="editForm" enctype="multipart/form-data">
		<?php if($mop==2){ ?>
	  	Name:<br>
	  	<input type="text" name="name" required pattern="^[a-zA-Z\d\-_\s]+$" maxlength="100" <?php echo ("value='{$prod['Nombre']}'"); ?> ><br>
	  	Category:<br>
			<select name="cat" required>
				<?php
				foreach($cats as $cat){
					echo("<option value='{$cat['ID']}'>{$cat['Nombre']}</option>");
				}
				?>
 			</select><br>
	  	Short Desc:<br>
	  	<input type="text" name="shortdesc" required pattern="^[a-zA-Z\d\-_\s]+$" maxlength="100" <?php echo ("value='{$prod['Descripción']}'"); ?> ><br>
	  	<!--Long Desc:<br>
      <textarea name="longdesc" rows="5" cols="18" pattern="^[a-zA-Z\d\-_\s]+$" maxlength="300" ><?php //echo ($prod[3]); ?></textarea><br>-->
	  	Price:<br>
	  	<input type="text" name="price"required pattern="^[0-9]+$" <?php echo ("value='{$prod['Precio']}'"); ?> ><br>
			<input type="hidden" name="mop" value="2">
			<input type="hidden" name="pid" <?php echo ("value='{$prod['ID']}'"); ?> >
			<input type="submit" id="confirmEdit" value="Modify Product">
		<?php }else{ ?>
			Name:<br>
	  	<input type="text" name="name" required pattern="^[a-zA-Z\d\-_\s]+$" maxlength="100"><br>
	  	Category:<br>
			<select name="cat" required>
				<?php
				foreach($cats as $cat){
					echo("<option value='{$cat['ID']}'>{$cat['Nombre']}</option>");
				}
				?>
 			</select><br>
	  	Short Desc:<br>
	  	<input type="text" name="shortdesc" required pattern="^[a-zA-Z\d\-_\s]+$" maxlength="100"><br>
	  	<!--Long Desc:<br>
      <textarea name="longdesc" rows="5" cols="18" pattern="^[a-zA-Z\d\-_\s]+$" maxlength="300"></textarea><br>
			-->
	  	Price:<br>
	  	<input type="text" name="price"required pattern="^[0-9]+$"><br>
			<input type="file" name="productImage" id="productImage" required>
			<input type="hidden" name="mop" value="1">
			<input type="submit" id="confirmEdit" value="Add Product">
		<?php } ?>

	</form>
</div>
