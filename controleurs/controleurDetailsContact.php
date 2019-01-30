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
require_once 'Modeles/Pays.php';

if (isset($_GET['details'])) {
    $_SESSION['modifierContact'] = $_GET['details'];
}
else{
    $_SESSION['modifierContact'] = null;
}


//ID du contact selectionné dans la liste des contacts afficher en ammont
$erreur = "";
$idContact = $_SESSION["modifierContact"];


if(isset($_POST['Valider'])) {
// Récup des attributs de variable Session

    $contact = Contact::mustFind($idContact);
    $nomContact = $_POST['Nom'];
    $prenomContact = $_POST['Prenom'];
    $societe = $_POST['Societe'];
    $commentaire = $_POST['Commentaire'];
    $dateNaiss = $_POST['dateNaiss'];

//partie adresse
    $numVoie = $_POST['NumVoie'];
    $nomVoie = $_POST['NomVoie'];
    $ville = $_POST['Ville'];
    $codePostal = $_POST['CodePostal'];
    $complement = $_POST['ComplAdresse'];

    // on vérifie que la date est bonne
    $dt = DateTime::createFromFormat("d-m-Y", $dateNaiss);
    if ($dt == false && array_sum($dt->getLastErrors())) {
        $erreur = "Le format de la date entrée est incorrect.";
    } else {
        // on récupere l'adresse du contact
        $adresseContact = intval(Contact::getInstances()->RechercheObjet($idContact, "adresse"));
        // mise à jour de l'adresse
        $contactAdrId = $contact->getAdresseID();
        $conditionRequeteAdr = "A_ID = $contactAdrId";

        Adresse::SQLUpdate(array($numVoie, $nomVoie, $complement, $ville, $codePostal), $conditionRequeteAdr);

        // attributs à ajouter dans l'ordre de la requête..
        $conditionRequeteCont = "C_ID = $idContact";

        //mise à jour du contact
        Contact::SQLUpdate(array($nomContact, $prenomContact, $societe, $commentaire), $conditionRequeteCont);
    }
    $_SESSION['modifierContact']=null;
}







require_once 'vues/DetailsContact.php';
?>