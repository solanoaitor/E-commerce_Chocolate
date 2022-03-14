<?php //Controlador perque el admin vegi els orders
require_once("models/connectDB.php");
require_once("models/dbManager.php");
if(!isset($_SESSION))
{
  session_start();
}
if($_SESSION['islogin']==1){
  $conn = connectDB();
  if($_SESSION['isadmin']==1){
    $uid=-1;
  }else{
    $uid = $_SESSION['uid'];
  }
  $orders = getOrders($conn,$uid);
  require("views/orders.php");
}else{
  echo("not an user");
}

?>
