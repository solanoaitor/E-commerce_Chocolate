<?php
require_once("../models/connectDB.php");
require_once("../models/dbManager.php");

$basePublicPath = 'img/';
session_start();
if($_SESSION['isadmin']==1){
  $conn = connectDB();
  $name = htmlentities($_POST['name']);
  $cat = htmlentities($_POST['cat']);
  $shortdesc = htmlentities($_POST['shortdesc']);
  $price = htmlentities($_POST['price']);
  $mop = $_POST['mop'];
  $pid = 0;
  if(isset($_POST['pid']))
  {
    $pid = $_POST['pid'];
  }
  $valid = 1;
  if(!preg_match("/^[a-zA-Z\d\-_\s]+$/",$name)){
    $valid = 0;
  }
  if(!preg_match("/^[a-zA-Z\d\-_\s]+$/",$shortdesc)){
    $valid = 0;
  }
  if(!preg_match("/^[0-9]+$/",$price)){
    $valid = 0;
  }
  if($valid==1){
    echo($mop);;
    if($mop == 1){
      $result = createProduct($conn,$name,$cat,$shortdesc,$price);
      $baseAbsolutePath = __DIR__ . '/../img/products/';
      $ext = strtolower(pathinfo($_FILES['productImage']['name'], PATHINFO_EXTENSION));
      $target_file = $baseAbsolutePath . $cat . '/' . $result . '.' . $ext;
      $validateImage = 1;

      $check = getimagesize($_FILES['productImage']['tmp_name']);
      if($check == false) {
        $validateImage = 0;
        echo("size");
      }
      if($ext != "jpg" && $ext != "png" && $ext != "jpeg"){
        $validateImage = 0;
        echo("ext");
      }
      if($validateImage == 1){
        if(move_uploaded_file($_FILES['productImage']['tmp_name'], $target_file)){
          require("../views/confirmProductsEdition.php");
        }else{
          echo("unsusesful upload");
        }
      }else{
        echo("invalid file");
      }
    }else{
      editProduct($conn,$pid,$name,$cat,$shortdesc,$price);
      echo ("edite");
      require("../views/confirmProductsEdition.php");
    }

  }else{
    echo("Invalid values (server side)");
  }
}
?>
