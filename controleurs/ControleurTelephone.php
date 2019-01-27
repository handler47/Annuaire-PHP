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

$erreur = "";

if(isset($_POST['Valider'])) {
    if (isset($_POST['telephone']) != "") {
        $telephone = $_POST['telephone'];
        $patternTelephone = '^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$';
        $typeTel = $_POST['typeTel'];
        $contactId = $_POST['contactId'];
        preg_match($patternTelephone, $telephone, $matches, PREG_OFFSET_CAPTURE, 3);
        if ($matches) {
            //création du telephone en récuperant l'id du contact en question
            Telephone::SQLInsert(array($typeTel, $telephone, $contactId));
            //recupération de l'ID adresse qui vient d'être créé

            echo '<div class="blockFormulaire">';
            echo 'Téléphone Créé ! ';
            echo '</div>';
        } else {
            $erreur = "Le format du numéro de téléphone est incorrect. Ex: 0658552211 (sans espaces, symboles ou tabulations)";
        }
    }
    }


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