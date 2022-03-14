<?php
//Totes les funcions realitzades al model
//Carrega productes segons la seva categoria
function getProducts($conn,$cid,$word){
  if($cid ==-2){
    $query = "SELECT * FROM productes WHERE nom LIKE '%$word%'";
  }else{
    if($cid == -1 or $cid == NULL) {
      $query = "SELECT * FROM productes";
    }else{
      $query = "SELECT * FROM productes HAVING id_categoria='$cid'";
    }
  }

  $result = $conn->prepare($query);
  $result->execute();

  $products = $result->fetchAll(PDO::FETCH_ASSOC);

  return $products;
}

//Carrega productes segons la seva id
function getProduct($conn,$pid){
  $query = "SELECT * FROM productes HAVING id=$pid";
  $result = $conn->prepare($query);
  $result->execute();

  $product = $result->fetchAll(PDO::FETCH_ASSOC);

  return $product;
}

//Carrega categories pel menu
function getCategories($conn){
  $query = "SELECT * FROM categories";
  $result = $conn->prepare($query);
  $result->execute();

  $categories = $result->fetchAll(PDO::FETCH_ASSOC);

  return $categories;
}

//Registrar-se mitjançant una sentencia parametritzada
function register($conn,$name,$pw,$mail,$adress,$cp,$poblacio){
  if (!($sql = $conn->prepare("INSERT INTO usuari (nom, email, contrasenya, direccio, cp, poblacio) VALUES (? ,? ,?, ? ,? ,?)")))
  {
    //echo "Falló la preparación: (" . $conn->errorInfo() . ") ";
  }
  $sql->execute(array($name,$mail,$pw,$adress,$cp,$poblacio));
}

//Retorna contrasenya amb el seu email
function getUserPassword($conn,$email,$pw){
  $query = "SELECT contrasenya FROM usuari WHERE email='$email'";
  $result = $conn->prepare($query);
  $result->execute();
  $hpw = NULL;
  // array numérico
  $hpw = $result->fetchAll(PDO::FETCH_ASSOC);

  if ($hpw != NULL){
    return $hpw[0]['contrasenya'];
  }else{

    return printf("");
  }
}

//Retorna id de l'usuari
function getUserId($conn,$email){
  $query = "SELECT id FROM usuari WHERE email='$email'";
  $result = $conn->prepare($query);
  $result->execute();
  $uid = NULL;
  // array numérico
  $uid = $result->fetchAll(PDO::FETCH_ASSOC);
  return $uid[0];
}

//Retorna informacio de l'usuari amb la id
function getUser($conn,$uid){
  $query = "SELECT * FROM usuari WHERE id=$uid";
  $result = $conn->prepare($query);
  $result->execute();
  $user = array();
  // array numérico
  $user = $result->fetchAll(PDO::FETCH_ASSOC);
  return $user[0];
}

//------------------------------------------------

//Carrega productes del cabas
function getCartProducts($conn,$products){
  $fields = implode(",", $products);
  //printf("fields0: %d", $fields[0]);
  $query = "SELECT * FROM productes WHERE id IN ($fields)";
  //printf("QUERY: %s", $query);
  $result = $conn->prepare($query);
  $result->execute();
  //array numérico

  $products = $result->fetchAll(PDO::FETCH_ASSOC);

  return $products;
}

//Inserir comanda en order command
function createOrder($conn,$uid,$cost,$cart,$count,$nproducts,$products){
  $timestamp = date("Y-m-d H:i:s");
  $query = "INSERT INTO comanda (data,id_usuari,preu,quantitat) VALUES ('$timestamp','$uid','$cost','$nproducts')";
  $result = $conn->prepare($query);
  $result->execute();
  $query = "SELECT id FROM 'comanda' WHERE id_usuari=$uid AND data=\"$timestamp\" ORDER BY 'comanda'.'id' DESC";

  $result = $conn->prepare($query);
  $result->execute();

  foreach($products as $prod){
    $id = $prod['id'];
    $nom = $prod['nom'];
    $preu = $prod['preu'];
    $quant = $count[$prod['id']];
    $query = "INSERT INTO linea_comanda (id_producte,quantitat,preu,nom) VALUES ('$id','$quant','$preu','$nom')";
    $result = $conn->prepare($query);
    $result->execute();

  }
  return $uid;
}

//Retorna comandes respecte el seu id
function getOrders($conn,$uid){
  if($uid==-1){
    $query = "SELECT * FROM comanda ORDER BY  ";
  }else{
    $query = "SELECT * FROM comanda WHERE id_usuari=$uid ORDER BY id ASC";
  }

  $result = $conn->prepare($query);
  $result->execute();
  // array numérico
  $orders = $result->fetchAll(PDO::FETCH_ASSOC);

  return $orders;
}

//Crear producte
function createProduct($conn,$name,$cat,$shortdesc,$price){
  $query = "INSERT INTO productes (nom,descripcio,preu,id_categoria) VALUES ('$name','$shortdesc','$price','$cat')";
  $result = $conn->prepare($query);
  $result->execute();
  $query = "SELECT id FROM productes WHERE nom='$name' ORDER BY id LIMIT 1";
  $result = $conn->prepare($query);
  $result->execute();
  $pid = $result->fetchAll(PDO::FETCH_ASSOC);

  return $pid[0]['id'];
}

//Editar producte
function editProduct($conn,$pid,$name,$cat,$shortdesc,$price){
  $query = "UPDATE productes SET nom='$name', descripcio='$shortdesc', preu='$price', id_categoria='$cat' WHERE id='$pid'";
  $result = $conn->prepare($query);
  $result->execute();
}

//Modificar usuari
function editAccount($conn,$uid,$name,$adress,$cp,$poblacio,$profile_image){
  $query = "UPDATE usuari SET nom='$name', direccio='$adress' , cp='$cp', poblacio='$poblacio', fitxer='$profile_image' WHERE id='$uid'";
  $result = $conn->prepare($query);
  $result->execute();
}

?>
