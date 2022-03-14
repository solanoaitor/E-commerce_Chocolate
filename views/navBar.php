<head>
    <title> Botiga </title>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" type="text/css" href="css/theme.css">
    <script src="jquery-3.2.1.min.js"></script>
</head>
<body>
<nav>
	<ul class="menu">
		<li><a href="index.php?accio=portada"><img src="img/home.png"></a></li>
		<li><a href="index.php?accio=products">Categories</a></li>
		<li ><a href="index.php?accio=register">Registra't</a></li>
		<li class="userMenu">
			<a href="#">Àrea Client</a>
		</li>
	</ul>
	<ul class="subMenu">
		<?php
		if(!isset($_SESSION))
		{
		  session_start();
		}

		if(!isset($_SESSION['islogin']))
		{
			$_SESSION['islogin'] = 0;
		}

		if($_SESSION['islogin']==1){
		?>
			<li><a href="index.php?accio=account">Perfil</a></li>
			<li><a href="index.php?accio=cart">Cabàs</a></li>
			<li><a href="index.php?accio=logout">Desconnectar</a></li>
			<li><a href="index.php?accio=orders">Comandes</a></li>
		<?php
			if($_SESSION['isadmin']==1){
		?>
			<li><a href="index.php?accio=plist">Visualitza Productes</a></li>
		<?php
			}
		}else{
		?>
			<li><a href="index.php?accio=login">Identifica't</a></li>
		<?php } ?>
	</ul>

</nav>
<script>
$(document).ready(function(){
      $('.userMenu').click(function(){
          $('.subMenu').toggle();
      });
});
</script>
</body>
