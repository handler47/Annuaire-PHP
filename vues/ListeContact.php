
<form method="get" action="index.php" class="blockFormulaire">
    <h2>Liste des Contacts : </h2>
	<a href="http://localhost/Annuaire-PHP/index.php?filtre" >Filtrer par code postal</a>
	<a href="http://localhost/Annuaire-PHP/index.php?pasfiltre" >Annuler filtre</a>
	<?php
	$ListeContacts = new Contacts();
	$ListeContacts->remplirAVECRequete($req,$condition,$filtre);
	Contact::getInstances()->displayTable();
	?>
</form>
