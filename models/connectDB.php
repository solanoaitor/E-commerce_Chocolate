<?php
//Connectar-se a la bd
function connectDB(){
  $userName = "tdiw-a4";
  $password = "bH1Dbfj_";
  try
  {
    $connection = new PDO('mysql:host=localhost;dbname=tdiwa4;charset=UTF8', $userName, $password);
  }
  catch (PDOException $excp)
  {
    echo "Error Connection" . $excp->getMessage()."<br>";
    die();
  }
  return $connection;
}
?>
