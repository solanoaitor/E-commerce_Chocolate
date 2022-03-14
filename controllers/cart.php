<?php
//Controlador del carrito
require_once("models/connectDB.php");
require_once("models/dbManager.php");

if(!isset($_SESSION))
{
  session_start();
}

if($_SESSION['islogin']==1){
  $cart = $_SESSION['cart'];
  $count = $_SESSION['count'];
  $conn = connectDB();

  $nproducts = $_SESSION['nprod'];

  $products = getCartProducts($conn,$cart);
  require_once("views/cart.php");

}else{
  echo ("no sesion scrub ");
}
?>

