<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Annuaire PHP</title>
    <link href="http://localhost/Annuaire-PHP/css/MyCSS.css" rel="stylesheet">
</head>
<body>


<?php
/**
	* Index du site
	* Permet le lien avec le Header/Footer, la connexion à la BDD
	* et le renvoie vers le Controleur Principal
*/

/**
	* Début de Session
*/
session_start();

/**
	* Header des pages du site
*/
require_once 'vues/Header.php';

/**
	* Appel classe Si
*/
require_once 'modeles/Si.php';

/**
	* Connexion SI
*/
$MySI = SI::getSI();


/**
	* Appel Controleur Principal
*/
?>
<div class="center">
    <?php
 require_once 'controleurs/ControleurPrincipal.php';
 ?>
</div>
<?php

/**
	* Footer des pages du site
*/
include 'vues/Footer.php';
?>


</body>
</html>

