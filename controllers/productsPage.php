<?php
//Controlador de la pagina de prductes
//Scripts que llegeixen les categories i fan crides ajax per actualitzar els valors
//Es carreguen els product target a l'acabar un ajax perquè al generar nous no estan detectats pel controlador
require_once("/home/TDIW/tdiw-a4/public_html/globals/globals.php");
require_once(ComputerDirectory."/models/connectDB.php");
require_once(ComputerDirectory."/models/dbManager.php");
$conn = connectDB();
$products = getProducts($conn,-1,0);
$categories = getCategories($conn);
require_once(ComputerDirectory."/views/productsPage.php");
require_once(ComputerDirectory."/views/productsDisplay.php");
?>

