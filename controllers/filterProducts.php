
<?php
//Es crida per recarregar productes segons cat_id mitjançant ajax
$cid = $_POST['cid'];
if(!isset($_POST['word']))
{
	$_POST['word'] = "";
}

require_once("../models/connectDB.php");
require_once("../models/dbManager.php");
$conn = connectDB();
//cid -1 = tots cid -2 mode cerca
if($cid==-2){
  $products = getProducts($conn,$cid,$word);
}else{
  $products = getProducts($conn,$cid,0);
}

//Es crida a la vista de productes per actualizar-la
require("../views/products.php");
?>
