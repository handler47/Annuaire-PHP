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

/* Lorsqu'un raffraichissement est fait sur la même page , la variable de session (protocole GET) contenant
l'id du contact disparait , on crée alors la variable de session globale (modifierContact) qui la remplacera ,
de ce fait on gardera en permemanance l'id du contact*/
if (isset($_GET['details'])) {
    $_SESSION['modifierContact'] = $_GET['details'];
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
    if (($dt == false) && count(DateTime::getLastErrors())>0) {
        $erreur = "Le format de la date entrée est incorrect.";
    } else {

        // on change le format de la date pour être compatible avec la table
        $newDate = date("Y-m-d", strtotime($dateNaiss));

        // on récupere l'adresse du contact
        $adresseContact = intval(Contact::getInstances()->RechercheObjet($idContact, "adresse"));
        // mise à jour de l'adresse
        $contactAdrId = $contact->getAdresseID();
        $conditionRequeteAdr = "A_ID = $contactAdrId";

        // on modifie les telephones (ici on parcours les types de telephones et on verifie via la variable de session qui a comme
        // le type de telephone si celle ci est initialisé comme variable de session ou pas et on la modifie si elle a une valeur
        // on fait comme cela sachant qu'on a que 4 valeurs possibles
        $TypeTelephones= new TypeTelephones();
        $TypeTelephones->remplir();
        foreach ($TypeTelephones->getArray() as $unType){
            if (isset($_POST[$unType->getTypeTel()])){
                $telephone = $_POST[$unType->getTypeTel()];
                var_dump($telephone);
                Telephone::SQLUpdate(array($telephone),"T_TypeTelID = " . $unType->getID());
                var_dump($unType->getID());
            }
        }

        Adresse::SQLUpdate(array($numVoie, $nomVoie, $complement, $ville, $codePostal), $conditionRequeteAdr);

        // attributs à ajouter dans l'ordre de la requête..
        $conditionRequeteCont = "C_ID = $idContact";

        //mise à jour du contact
        Contact::SQLUpdate(array($nomContact, $prenomContact, $newDate, $societe, $commentaire), $conditionRequeteCont);

        echo '<div class="blockFormulaire">';
        echo '<p>Contact modifié ! </p>';
        echo '</div>';
    }
    $_SESSION['modifierContact']=null;
}







require_once 'vues/DetailsContact.php';
?>