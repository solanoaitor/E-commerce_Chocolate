<?php
//Fa una crida per crear la query parametritzada i actualitzar la vista amb ajax
$basePublicPath = 'img/';
$name = htmlentities($_POST['name']);
$adress = htmlentities($_POST['adress']);
$cp = htmlentities($_POST['cp']);
$poblacio = htmlentities($_POST['poblacio']);

if(!isset($_SESSION))
{
  session_start();
}
$uid = $_SESSION['uid'];
$profile_image = $_SESSION['uid'].".png";
require_once("/home/TDIW/tdiw-a4/public_html/models/connectDB.php");
require_once("/home/TDIW/tdiw-a4/public_html/models/dbManager.php");
//Comprovem inputs valids
$valid = 1;
if(!preg_match("/^[a-zA-Z]+$/",$name)){
  $valid = 0;
}
if(!preg_match("/^[a-zA-Z\d\-_\s]+$/",$adress)){
  $valid = 0;
}
if(!preg_match("/^[a-zA-Z\d\-_\s]+$/",$cp)){
  $valid = 0;
}

if (!empty($_FILES['profile_image']) && !empty($_FILES['profile_image']['name'])) {
  $filesAbsolutePath ='/home/TDIW/tdiw-a4/public_html/img/';
  move_uploaded_file($_FILES['profile_image']['tmp_name'],$filesAbsolutePath.$profile_image);
}
//Si tots els inputs son valids
if($valid != 0){
  //Conectar-se al model
  $conn = connectDB();
  //Query parametrizada
  editAccount($conn,$uid,$name,$adress,$cp,$poblacio,$profile_image);
  //Actualitzem a la confirmacio del registre
  require("/home/TDIW/tdiw-a4/public_html/views/confirmUpdateAccount.php");
}else{
  //Input invalida a la banda del servior
  echo ("Valor invàlid<br>");
}

?>
