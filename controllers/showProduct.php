<?php
//Es crida amb ajax per passar a mostrar un producte
$pid = $_POST["pid"];
require_once("../models/connectDB.php");
require_once("../models/dbManager.php");
$conn = connectDB();
$product = getProduct($conn,$pid);
//Es crida a la vista del producte
require("../views/product.php");
?>
