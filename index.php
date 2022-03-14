
<?php
require_once(__DIR__."/globals/globals.php");

$accio = $_GET['accio'] ?? 'portada';

require(NavBar);

require(ComputerDirectory."/recursos/recursCartPreview.php");

switch ($accio) {
  case ('products'):
    require(ComputerDirectory."/recursos/recursProductPage.php");
  break;
  case ('register'):
    require(ComputerDirectory."/recursos/recursRegistre.php");
  break;
	case ('login'):
    require(ComputerDirectory."/recursos/recursLogin.php");
  break;
	case ('logout'):
    require(ComputerDirectory."/recursos/recursLogout.php");
  break;
	case ('account'):
    require(ComputerDirectory."/recursos/recursAccount.php");
  break;
	case ('cart'):
    require(ComputerDirectory."/recursos/recursCart.php");
  break;
	case ('orders'):
    require(ComputerDirectory."/recursos/recursOrders.php");
  break;
	case ('plist'):
    require(ComputerDirectory."/recursos/recursProductsList.php");
  break;
    case ('updateAccount'):
        require(ComputerDirectory."/recursos/recursUpdateAccount.php");
        break;
  case ('portada'):
		require(ComputerDirectory."/recursos/portada.php");
  break;
	default:
		require(ComputerDirectory."/recursos/portada.php");
	break;
}
?>

