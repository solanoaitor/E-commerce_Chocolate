<?php
//Es crida per crear la query parametritzada i actualitzar la vista amb ajax
$name = htmlentities($_POST["name"]);
$pw = htmlentities($_POST["pw"]);
$email = htmlentities($_POST["email"]);
$adress = htmlentities($_POST["adress"]);
$cp = htmlentities($_POST["cp"]);
$poblacio = htmlentities($_POST["poblacio"]);
$hpw = password_hash($pw, PASSWORD_DEFAULT);
require_once("../models/connectDB.php");
require_once("../models/dbManager.php");

//Comprobem inputs valids
$valid = 1;
if(!preg_match("/^[a-zA-Z]+$/",$name)){
  $valid = 0;
  echo ("Fallo al nom<br>");
}
if(!preg_match("/^[a-zA-Z0-9]{1,15}$/",$pw)){
  $valid = 0;
  echo ("Fallo a la contrasenya<br>");
}
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
  $valid = 0;
  echo ("Fallo a l'adreça de correu<br>");
}
if(!preg_match("/^[a-zA-Z\d\-_\s]+$/",$adress)){
  $valid = 0;
  echo ("Fallo a la direcció<br>");
}
if(!preg_match("/^[A-Z\d\-_\s]+$/",$cp)){
  $valid = 0;
  echo ("Fallo al codi postal<br>");
}
//Si tots son valids
if($valid != 0){
  //Conectarse al model
  $conn = connectDB();
  //Query parametritzada
  register($conn,$name,$hpw,$email,$adress,$cp,$poblacio);
  //Actialitzem a la confirmacio del registre
  require("../views/confirmRegistration.php");
}else{
  //Input invalida a la banda del servidor
  echo ("Fallo al servidor, evita posar accents<br>");
}

?>
