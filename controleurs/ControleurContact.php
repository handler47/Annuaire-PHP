<?php

/**
	* Controleur Contact du site
	* Permet le lien vers le Formulaire de Creation de Contact
*/
//référencer les classes utiles
require_once 'Modeles/Pluriel.php';
require_once 'Modeles/Element.php';
require_once 'Modeles/Contact.php';
require_once 'Modeles/Telephone.php';
require_once 'Modeles/TypesTelephone.php';
require_once 'Modeles/Adresse.php';
require_once 'Modeles/Pays.php';

$erreur = '';


if(isset($_POST['Valider'])){
	if(isset($_POST['Nom'])!="" or isset($_POST['Prenom'])!="" ){
		$Nom = $_POST['Nom'];
		$Prenom = $_POST['Prenom'];
		if(isset($_POST['DateNaiss'])!="" ){
			$DateNaiss = $_POST['DateNaiss'];
			$NumV = null;
			$NomV = null;
			$ComplA = null;
			$Ville = null;
			$CD = null;
			$Commentaire = null;
			$Pays = null;
			
			if(isset($_POST['Societe'])!="" or !empty($_POST['CodePostal']) or isset($_POST['NomVoie'])!="" or isset($_POST['ComplAdresse'])!="" or isset($_POST['Ville'])!="" or isset($_POST['Pays'])!="" or isset($_POST['Commentaire'])!=""){
				$Societe = $_POST['Societe'];
				$NumV = $_POST['NumVoie'];
				$NomV = $_POST['NomVoie'];
				$ComplA = $_POST['ComplAdresse'];
				$Ville = $_POST['Ville'];
				$Commentaire = $_POST['Commentaire'];
				$Pays = $_POST['Pays'];				
			}
			if(isset($_POST['CodePostal']) and !empty($_POST['CodePostal'])){
				if(intval($_POST['CodePostal'])!= 0){
					if(strlen($_POST['CodePostal'])==5){
						
						$CD = intval($_POST['CodePostal']);
						
					}else{
						$erreur = $erreur.'<p class=erreur > Le code postal doit être à 5 chiffres </p>';
					}
				}else{
					$erreur = $erreur.'<p class=erreur > Le code postal ne doit pas contenir de lettre </p>';
				}
			}
			
			//création de l'adresse du contact
			//même si l'adresse a tout ses attributs null car il est possible de modifier un contact !
			Adresse::SQLInsert(array($NumV,$NomV,$ComplA,$Ville,$CD,$Pays));
			//recupération de l'ID adresse qui vient d'être créé
			$IDAdresse=0;
			$adresseContact = new Adresses();
			$adresseContact->remplir(null," A_ID DESC  Limit 1");
			$IDAdresse = Adresse::getInstances()->displayAdresse();
			//creation du contact
			Contact::SQLInsert(array($Nom,$Prenom,$DateNaiss,$IDAdresse,$Societe,$Commentaire));
			$Contact = new Contacts();
			$Contact->remplir(" 1 "," C_ID DESC Limit 1");
			$IDContact = Contact::getInstances()->RechercheID();
			echo '<div class="blockFormulaire">';
			echo 'Contact créé ! ';
			echo 'Ajouter un téléphone au contact ? <a href="http://localhost/Annuaire-PHP/index.php?ajouterNumero='.$IDContact.'"> oui</a> /<a href="http://localhost/Annuaire-PHP/index.php"> non</a>';
			echo '</div>';
		}else{
			$erreur = $erreur.'<p class=erreur > Pas de date de naissance saisie </p>';
		}
		
	}else{
		$erreur = $erreur.'<p class=erreur > Merci de saisir votre Nom et Prénom </p>';
	}
}


require_once 'vues/CreationContact.php';
?>