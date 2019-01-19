<?php
/**
	* Controleur Principal du site
	* Permet le lien vers les autres Formulaires
*/

require_once 'Vues/Accueil.php';

?>
    <?php
if(isset($_POST["NewContact"])) {
	$_SESSION['Menu'] = "Contact";
    require_once 'controleurs/ControleurContact.php';
}

if(isset($_POST["NewTel"])) {
	$_SESSION['Menu'] = "Tel";
    require_once 'controleurs/ControleurTelephone.php';
}

if(isset($_POST["Accueil"])) {
	$_SESSION['Menu'] = "Accueil";
    require_once 'vues/Accueil.php';
	require_once 'vues/ListeContact.php';
}


if (!isset($_SESSION['Menu'])) {
	$_SESSION['Menu']="Accueil";
	require_once 'vues/Accueil.php';

}

switch ($_SESSION['Menu']) {
	case "Contact":
		require_once 'controleurs/ControleurContact.php';
		break;
    case "Tel":
        require_once 'controleurs/ControleurTelephone.php';
        break;
    case "Accueil":
        require_once 'controleurs/ControleurPrincipal.php';
        break;
}

 
?>
