<?php

/**
	* Controleur Telephone du site
	* Permet le lien vers le Formulaire de Creation de Téléphone
*/
require_once 'Modeles/Pluriel.php';
require_once 'Modeles/Element.php';
require_once 'Modeles/Contact.php';
require_once 'Modeles/Telephone.php';
require_once 'Modeles/TypesTelephone.php';
require_once 'Modeles/Adresse.php';
require_once 'Modeles/Pays.php';

//référencer les classes utiles
//require_once 'Modeles/contact.php';

//erreur = "";

 //if(isset($_POST[''])){
	// if($_POST['Desc']!=""){
	// }
// }


// else{
	// $erreur = "L'élève est déjà enregistré !";
	// echo '<script type="text/javascript">window.alert("'.$erreur.'");</script>';
// }

require_once 'vues/CreationTelephone.php';
?>