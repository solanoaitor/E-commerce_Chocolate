<?php
//Cridem la vista del preview del cabas

if(!isset($_SESSION))
{
  session_start();
}

if(!isset($_SESSION['islogin']))
{
	$_SESSION['islogin'] = 0;
}

if($_SESSION['islogin']==1){
  $nproducts = $_SESSION['nprod'];
  $cost = $_SESSION['cost'];
  $ses = $_SESSION['uid'];
  require("views/cartPreview.php");
}
?>

