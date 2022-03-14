<?php
//Controlador de la pagina de prductes
if(!isset($_SESSION))
{
  session_start();
}
if($_SESSION['isadmin']==1){
  require_once(ComputerDirectory."/models/connectDB.php");
  require_once(ComputerDirectory."/models/dbManager.php");
  $conn = connectDB();
  $products = getProducts($conn,-1,0);
  require_once(ComputerDirectory."/views/productsList.php");
}else{
  echo("No sou administrador");
}
?>

