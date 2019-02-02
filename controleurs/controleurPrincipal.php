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
require_once 'Modeles/Pays.php';
require_once 'Vues/Accueil.php';


//Suppression d'un Contact de la liste
if(isset($_GET["supprimer"])) {
	$_SESSION['Menu'] = "Accueil";
	$IDContactSuppression = $_GET["supprimer"];
	$listeContacts = new Contacts();
    $listeContacts->remplir();
	echo'<div class="blockFormulaire">';
    echo 'Voulez-vous vraiment supprimer le contact '.Contact::getInstances()->RechercheObjet($IDContactSuppression,"nom").' ?
    <a href="http://localhost/Annuaire-PHP/index.php?confirmation='.$IDContactSuppression.'" > Oui</a>
	ou <a href="http://localhost/Annuaire-PHP/index.php?non" name="non">Non</a>';
	echo'</div>';
}

if(isset($_GET["confirmation"])) {
	$IDContact = intval($_GET["confirmation"]);
	$IDAdresse = null;
	$adresseContact = 0;
	//on récupère l'IDAdresse du contact
	$Contact = new Contacts();
    $Contact->remplir();
	$adresseContact = intval(Contact::getInstances()->RechercheObjet($IDContact,"adresse"));
	//on supprime l'adresse du contact puis le contact
	Adresse::SQLDelete($adresseContact);
	Contact::SQLDelete($IDContact);
	echo'<div class="blockFormulaire">';
	echo '<p>Contact supprimé ! </p>';
	echo'</div>';
	require_once 'index.php';
}


if(isset($_GET["details"])) {
	$_SESSION['Menu'] = "DetailsContact";
	require_once 'controleurs/ControleurDetailsContact.php';
}

if(isset($_GET["ajouterNumero"])) {
	$_SESSION['Menu'] = "AjoutTelephone";
	require_once 'controleurs/ControleurTelephone.php';
}

if(isset($_GET["filtre"])) {
	$req = "SELECT C_ID, C_Nom, C_Prenom, C_DateNais, C_AdresseID, C_Societe, C_Commentaire FROM contact As C,adresse As A";
	$condition = "C.C_AdresseID = A.A_ID";
	$filtre = "A.A_CodePostal;";
	$_SESSION['Menu'] = "Accueil";
    require_once 'vues/Accueil.php';
	require_once 'vues/ListeContact.php';
}

if (isset($_GET["page"])){
	$req = Contact::getSELECT();
	$condition = null;
	$filtre=null;
	$_SESSION['Menu'] = "Accueil";
	require_once 'vues/Accueil.php';
	require_once 'vues/ListeContact.php';
}

if(isset($_POST["ajouterContact"])) {
	$_SESSION['Menu'] = "Contact";
    require_once 'controleurs/ControleurContact.php';
}

if(isset($_POST["Accueil"]) or isset($_GET["non"]) or isset($_GET["pasfiltre"]) ) {
	$req = "SELECT C_ID, C_Nom, C_Prenom, C_DateNais, C_AdresseID, C_Societe, C_Commentaire FROM contact";
	$condition = null;
	$filtre = " C_Nom,C_Prenom ASC";
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
    case "Accueil":
        require_once 'controleurs/ControleurPrincipal.php';
		break;
	case "DetailsContact";
	    require_once 'controleurs/ControleurDetailsContact.php';
        break;
	case "AjoutTelephone";
		require_once 'controleurs/ControleurTelephone.php';
		break;
}



?>
