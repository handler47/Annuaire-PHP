<?php
require_once 'Vues/Accueil.php';

if(isset($_POST["NewContact"])) {
	//$_SESSION['Menu'] = "Contact";
	$_SESSION['Menu'] = "Contact";
    require_once 'Controleurs/ControleurContact.php';
}

if(isset($_POST["NewTel"])) {
	//$_SESSION['Menu'] = "Contact";
	$_SESSION['Menu'] = "Tel";
    require_once 'Controleurs/ControleurTelephone.php';
}

if(isset($_POST["Accueil"])) {
	$_SESSION['Menu'] = "Accueil";
    require_once 'Vues/Accueil.php';
	require_once 'Vues/ListeContact.php';
}


if (!isset($_SESSION['Menu'])) {
	$_SESSION['Menu']="Accueil";
	require_once 'Vues/Accueil.php';

}

switch ($_SESSION['Menu']) {
	case "Contact":
		require_once 'Controleurs/ControleurContact.php';
		break;
    case "Tel":
        require_once 'Controleurs/ControleurTelephone.php';
        break;
    case "Accueil":
        require_once 'Controleurs/ControleurPrincipal.php';
        break;
}

 
?>