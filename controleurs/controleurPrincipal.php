<?php
/**
	* Controleur Principal du site
	* Permet le lien vers les autres Formulaires
*/
require_once 'Modeles/Pluriel.php';
require_once 'Modeles/Element.php';
require_once 'Modeles/Contact.php';
require_once 'Modeles/Telephone.php';
require_once 'Modeles/TypesTelephone.php';
require_once 'Modeles/Adresse.php';
require_once 'Vues/Accueil.php';


//Suppression d'un Contact de la liste
if(isset($_POST["supprContact"])) {
	$_SESSION['Menu'] = "Accueil";
	$IDContactSuppression = substr($_POST["supprContact"],-1,1);
	$ListeContacts = new Contacts();
    $ListeContacts->remplir();
	echo'<div class="blockFormulaire">';
    echo 'Voulez-vous vraiment supprimer le contact '.Contact::getInstances()->RechercheObjet($IDContactSuppression).' ?
    <a href="http://localhost/Annuaire-PHP/index.php?confirmation='.$IDContactSuppression.'" > Oui</a>
	ou <a href="http://localhost/Annuaire-PHP/index.php" name="non">Non</a>';
	echo'</div>';
}

if(isset($_GET["confirmation"])) {
	$IDContact = intval($_GET["confirmation"]);
	Contact::SQLDelete($IDContact);
	echo'<div class="blockFormulaire">';
	echo "Suppression du contact";
	echo'</div>';
	require_once 'index.php';
}



if(isset($_POST["NewContact"])) {
	$_SESSION['Menu'] = "Contact";
    require_once 'controleurs/ControleurContact.php';
}

if(isset($_POST["NewTel"])) {
	$_SESSION['Menu'] = "Tel";
    require_once 'controleurs/ControleurTelephone.php';
}



if(isset($_POST["details"])) {
	$_SESSION['Menu'] = "DetailsContact";
    require_once 'vues/Accueil.php';
	require_once 'controleurs/ControleurDetailsContact.php';
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
	case "DetailsContact";
	    require_once 'controleurs/ControleurDetailsContact.php';
        break;
}



 
?>
