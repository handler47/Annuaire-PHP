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

//ID du contact ajouter en amont dans le formulaire de creation de contact
$erreur = '';
if (isset($_GET['details'])) {
    $_SESSION['ajouterNumero'] = $_GET['details'];
}
$contactId = $_SESSION["ajouterNumero"];

if(isset($_POST['Valider'])) {
    if (isset($_POST['telephone']) != "") {
        $telephone = $_POST['telephone'];
        $patternTelephone = '/^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$/';
        $typeTel = $_POST['typeTel'];

            $contactId = ''.$_SESSION['ajouterNumero'].'';
            var_dump($typeTel);
            preg_match($patternTelephone, $telephone, $matches);
            if ($matches) {

                //recupération de l'ID adresse qui vient d'être créé

                // on vérifie que le type de tel n'existe pas déjà
                $contact = Contact::mustFind($contactId);
                $telephones = $contact->getTelephones();
                $telephones->remplir("T_TypeTelID = " . $typeTel);
                if ($telephones->getNombre() >= 1){
                    $erreur = "<p class=erreur>Le type de tel est déjà présent.</p>";
                }
                else {
                    //création du telephone en récuperant l'id du contact en question
                    Telephone::SQLInsert(array($telephone,$typeTel, $contactId));
                    echo '<div class="blockFormulaire">';
                    echo '<p >Téléphone Créé ! </p>';
                    echo '</div>';
                }
            } else {
                $erreur = $erreur.'<p class="erreur" > Le format du numéro de téléphone est incorrect. Ex: 0658552211 (sans espaces, symboles ou tabulations) </p>';
            }

    }
    }

require_once 'vues/CreationTelephone.php';
?>