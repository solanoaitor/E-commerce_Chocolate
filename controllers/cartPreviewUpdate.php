<?php

$cartop = 0;
$pid = 0;
$price = 0;
$nprod = 0;

if(isset($_POST['cartop']))
{
  $cartop = $_POST['cartop'];
}
if(isset($_POST['pid']))
{
  $pid = $_POST['pid'];
}
if(isset($_POST['price']))
{
  $price = $_POST['price'];
}
if(isset($_POST['quantitat']))
{
  $nprod = $_POST['quantitat'];
}


if(!isset($_SESSION))
{
  session_start();
}

if(!isset($_SESSION['cart']) || gettype($_SESSION['cart']) == 'string')
{
  $_SESSION['cart'] = array();
}

if($_SESSION['islogin']==1){
  if($cartop==1){
    //Calculem el nombre de productes i el preu
    $_SESSION['nprod'] = $_SESSION['nprod']+$nprod;
    $_SESSION['cost'] = $_SESSION['cost']+ $price;

    array_push($_SESSION['cart'], intval($pid));

    if(isset($_SESSION['count'][$pid])){
      $_SESSION['count'][$pid] = $_SESSION['count'][$pid]+$nprod;
    }else{
      $_SESSION['count'][$pid] = $nprod;
    }
  }
  if($cartop==2){
    //Esborrem cabas
    $_SESSION['nprod'] = 0;
    $_SESSION['cost'] = 0;
    $_SESSION['cart'] = array();
    $_SESSION['count'] = array();
  }

  $nproducts = $_SESSION['nprod'];
  $cost = $_SESSION['cost'];
  $ses = $_SESSION['uid'];
  require("/home/TDIW/tdiw-a4/public_html/views/cartPreviewUpdate.php");
}
?>
