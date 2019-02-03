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
$erreur = ""; $erreur2="";
$contactId = $_SESSION['IDContact'];

if(isset($_POST['Valider'])) {
    if (isset($_POST['telephone']) != "") {
        $telephone = $_POST['telephone'];
        $patternTelephone = '/^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$/';
        $typeTel = $_POST['typeTel'];

            preg_match($patternTelephone, $telephone, $matches);
            if ($matches) {

                //recupération de l'ID adresse qui vient d'être créé

                // on vérifie que le type de tel n'existe pas déjà
                $contact = Contact::mustFind($contactId);

                // On stocke les telephones par types dans cette premiere liste
                $telephonesList1 = new Telephones();
                $telephonesList1->remplir("T_TypeTelID = " . $typeTel . " AND T_ContactID = " . $contactId);

                if ($telephonesList1->getNombre() >= 1){
                    $erreur = "<p class=erreur>Le type de tel est déjà présent.</p>";
                }

                // dans cette liste on stocke par numéro
                $telephonesList2 = new Telephones();
                $telephonesList2->remplir("T_numero = " . $telephone . " AND T_ContactID = " . $contactId);

                if ( $telephonesList2->getNombre() >= 1){
                    $erreur2 = "<p class=erreur>Le numéro est déjà présent</p>";
                }
                if (empty($erreur) && empty($erreur2)) {
                    //création du telephone en récuperant l'id du contact en question
                    print_r($telephone);
                    print_r($typeTel);
                    print_r($contactId);
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