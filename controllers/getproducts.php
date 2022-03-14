<?php
$cid = $_GET['cid'] ??NULL;
$pid = $_GET['pid'] ??NULL;
$mysqli = new mysqli("localhost", "tdiw-j1", "eusaepia", "tdiw-j1");

// Verifica la connexio
if (mysqli_connect_errno()) {
    printf("Falló la conexión failed: %s\n", $mysqli->connect_error);
    exit();
}
if($pid == NULL){
  if($cid == NULL) {
    $query = "SELECT * FROM Products";
  }else{
    $query = "SELECT * FROM Products HAVING category_id='$cid'";
  }
}else{
  $query = "SELECT * FROM Products HAVING id_product='$pid'";
}

$result = $mysqli->query($query);
$products = array();
// Array numeric
while($row = $result->fetch_array(MYSQLI_NUM)){
  $products[] = $row;
}
if($pid==NULL){
  include __DIR__."/../views/products.php";
}else{
  include __DIR__."/../views/product.php";
}
?>
