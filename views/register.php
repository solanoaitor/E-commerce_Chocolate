<?php //Vista del formulari de registre ?>
<div id="registerDiv" class="register">
	<div id="registerError">
	</div>
	<form id="registerForm">
	  	Nom:<br>
	  	<input type="text" name="firstname" required pattern="^[a-zA-Z]+$"><br>
	  	Contrasenya:<br>
	  	<input type="password" name="password" required pattern="^[a-zA-Z0-9]{1,15}$"><br>
	  	Email:<br>
	  	<input type="email" name="email" required ><br>
	  	Direcció:<br>
	  	<input type="text" name="adress" required maxlength="30" pattern="^[a-zA-Z\d\-_\s]+$"><br>
	  	Codi Postal:<br>
	  	<input type="text" name="cp" ˆ\d{5}$ required maxlength="5" ><br>
	  	Població:<br>
	  	<input type="text" name="poblacio" required maxlength="30" pattern="^a-zA-Z\d\-_\s]+$"><br>
	  	<input type="submit" id="theButton" value="Confirma">
	</form>
</div>
