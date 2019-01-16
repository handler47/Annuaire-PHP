<?php
session_start();

//header
require_once 'vues/header.php';
//référencer les classes utiles
require_once 'modeles/accessBDD.php';

//connexion à la BDD
$MySI = SI::getSI();
?>

<?php

//Controleur
 require_once 'Controleurs/ControleurPrincipal.php';

?>

<?php
//footer
include 'vues/footer.php';
?>