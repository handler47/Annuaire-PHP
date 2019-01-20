
<form method="get" action="index.php" class="blockFormulaire">
    <h2>Liste des Contacts : </h2>
	<?php
	    $ListeContacts = new Contacts();
    	$ListeContacts->remplir();
		Contact::getInstances()->displayTable();
	?>
</form>

