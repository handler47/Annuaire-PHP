<?php
/**
	* Controleur Details du Contact du site
	* Permet le lien vers le Formulaire de Creation de Téléphone
*/
require_once 'Modeles/Pluriel.php';
require_once 'Modeles/Element.php';
require_once 'Modeles/Contact.php';
require_once 'Modeles/Telephone.php';
require_once 'Modeles/TypesTelephone.php';
require_once 'Modeles/Adresse.php';

//ID du contact selectionné dans la liste des contacts afficher en ammont
$IDContact = substr($_POST["details"],-1,1);







require_once 'vues/DetailsContact.php';
?>