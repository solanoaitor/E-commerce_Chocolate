<?php
require_once("../models/connectDB.php");
require_once("../models/dbManager.php");
$conn = connectDB();
$cats = getCategories($conn);
$mop = $_POST['mop'];
if(isset($_POST['pid']))
{
  $pid = $_POST['pid'];
}
if($mop == 2){
  $products = getProduct($conn,$pid);
  $prod = $products[0];
}
require("../views/productModify.php");

?>
