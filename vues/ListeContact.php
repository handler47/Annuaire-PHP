<?php
require_once 'controleurs/ControleurPagination.php';

?>
<form method="get" action="index.php" class="blockFormulaire">
    <h2>Liste des Contacts : </h2>
	<a href="http://localhost/Annuaire-PHP/index.php?filtre" >Filtrer par code postal</a>
	<a href="http://localhost/Annuaire-PHP/index.php?pasfiltre" >Annuler filtre</a>
	<?php
	/*$ListeContacts = new Contacts();
	$ListeContacts->remplirAVECRequete($req,$condition,$filtre);
	Contact::getInstances()->displayTable();*/

    $ListeContactsTotal = new Contacts();
    $ListeContactsTotal->remplir();

    // récupèration de la constante LIMIT_PER_PAGE à partir du controleur
    $limit_contact_per_page = getLIMIT_PER_PAGE();

    $ListeContactsPage = new Contacts();
    $ListeContactsPage->remplirAVECRequete($req,$condition,$filtre,$premiereEntreeCalcul,$limit_contact_per_page);

    $ListeContactsPage->displayTable();
    pagination($ListeContactsTotal,$page);

    // affichage des liens
	?>
</form>
