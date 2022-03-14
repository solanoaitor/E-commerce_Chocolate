<?php

$email = htmlentities($_POST["email"]);
$pw = htmlentities($_POST["pw"]);

require_once("../models/connectDB.php");
require_once("../models/dbManager.php");
$valid=1;
if(!preg_match("/^[a-zA-Z0-9]{1,15}$/",$pw)){
  $valid = 0;
}
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
  $valid = 0;
}

//Ens connectem a la bd
if($valid == 1){
  $conn = connectDB();
  $hpw = getUserPassword($conn,$email,$pw);

  //Inicialitzem les variables $_SESSION
  if(password_verify($pw, $hpw)) {
    session_start();
    $uid = getUserId($conn,$email);
    $_SESSION['uid']  = $uid['id'];
    $_SESSION['nprod'] = 0;
    $_SESSION['cost'] = 0;
    $_SESSION['cart'] = array();
    $_SESSION['count'] = array();
    $_SESSION['islogin'] = 1;
    $_SESSION['isadmin'] = getUserId($conn, $email);
    require("../views/confirmLogin.php");
  }else{
    echo ("Dades incorrectes ");
  }
}else{
  echo ("Format incorrecte de correu");
}

?>
