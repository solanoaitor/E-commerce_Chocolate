<?php
//Controlador del carrito
require_once("models/connectDB.php");
require_once("models/dbManager.php");

if(!isset($_SESSION))
{
  session_start();
}
if($_SESSION['islogin']==1){
  $user = $_SESSION['uid'];
  $admin = $_SESSION['isadmin'];
  $conn = connectDB();
  $userinfo = getUser($conn,$user);
  require("views/account.php");
}else{
  echo ("no sesion scrub");
}
?>

