<?php
require_once("../models/connectDB.php");
require_once("../models/dbManager.php");
if(!isset($_SESSION))
{
  session_start();
}
if($_SESSION['islogin']==1){
  $nprod = $_SESSION['nprod'];
  $cost = $_SESSION['cost'];
  $uid = $_SESSION['uid'];
  $cart = $_SESSION['cart'];
  $count = $_SESSION['count'];
  $nproducts = $_SESSION['nprod'];
  $conn = connectDB();
  //Mostra els productes i realitzem comanda
  $products = getCartProducts($conn,$cart);
  $result=createOrder($conn,$uid,$cost,$cart,$count,$nproducts,$products);
  require("../views/confirmOrder.php");
}else{
  echo("Error placing order");
}


?>
