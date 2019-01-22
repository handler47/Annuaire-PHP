
<div class="blockFormulaire">
	<form method="post" action="index.php" class="">
		<h2>Creation d'un Contact</h2>
		<label>Nom : </label>
        <input type="text" class="champ" name="Nom" id="Nom" placeholder="Smith">
		<label>Prénom : </label>
        <input type="text" class="champ" name="Prenom" id="Prenom" placeholder="John">
		<br></br>
		<label>Date de Naissance : </label>
        <input type="text" class="champ" name="DateNaiss" id="DateNaiss" placeholder="00/00/0000">
		<br></br>
		<label>Numero de la voie : </label>
        <input type="text" class="champ" name="NumVoie" id="NumVoie" placeholder="3">
		<br></br>
		<label>Nom de la voie : </label>
        <input type="text" class="champ" name="NomVoie" id="NomVoie" placeholder="Rue Régis">
		<br></br>
		<label>Complément d'adresse : </label>
        <Textarea  type="textera" class="champ" name="CompAdresse" rows=1 cols=30 wrap=physical placeholder="Résidence,Batiment,Etage,Appartement"></Textarea>
		<br></br>
		<label>Ville : </label>
        <input type="text" class="champ" name="Ville" id="Ville" placeholder="Paris">	
		<label>Code Postal : </label>
        <input type="text" class="champ" name="CodePostal" id="CodePostal" placeholder="00000">	
		<br></br>		
		<label>Pays : </label>
		<?php
	    $ListePays = new ListPays();
    	$ListePays->remplir(null,"P_Nom ASC");
		Pays::getInstances()->displaySelect("pays");
		?>
		<br></br>	
		<Textarea  type="textera" class="champ" name="Commentaire" rows=2 cols=40 wrap=physical placeholder="Commentaire"></Textarea>
	</form>
</div>

