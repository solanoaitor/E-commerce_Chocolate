
<div class="register">
	<div id="infoError">
	</div>
	<div id="accountDiv">
		<form>
			<br>
			<?php
			if($admin==1){

			}
			?>
		<b>Modifica Les teves dades:</b>
    <br>
    <br>
		  <b>Nom:</b>
	    <?php echo("{$userinfo['nom']}");?> <br>
		  <b>E-mail:</b>
	    <?php echo("{$userinfo['email']}");?> <br>
	    <b>Direcció:</b>
	    <?php echo("{$userinfo['direccio']}");?> <br>
            <b>Codi Postal:</b>
	    <?php echo("{$userinfo['cp']}");?> <br>
	   <b>Població:</b>
	   <?php echo("{$userinfo['poblacio']}");?> <br>
			<br>
			<button type='button' id='editInfo' value='#'>Fes click per editar</button>
		</form>
	</div>
</div>
