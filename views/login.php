<?php //Vista del formulari de login ?>
<div id="loginDiv" class="register">
	<div id="loginError">
	</div>
	<form id="loginForm">
	  	E-mail:<br>
	  	<input type="email" name="email" required><br>
	  	Contrasenya:<br>
	  	<input type="password" name="password" required pattern="^[a-zA-Z0-9]{1,15}$"><br>
	  	<input type="submit" id="loginButton" value="Confirma">
	</form>
</div>
