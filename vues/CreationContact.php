
<div class="blockFormulaire">
	<form method="post" action="index.php" class="">
		<h2>Creation d'un Contact</h2>
		<label>Nom : </label>
        <input type="text" class="champ" name="Nom" id="Nom">
		<label>Prénom : </label>
        <input type="text" class="champ" name="Prenom" id="Prenom">
		<label>Date de Naissance : </label>
        <input type="text" class="champ" name="DateNaiss" id="DateNaiss" placeholder="0000\00\00">
		<br></br>
		<label>Numero de la voie : </label>
        <input type="text" class="champ" name="NumVoie" id="NumVoie">
		<label>Nom de la voie : </label>
        <input type="text" class="champ" name="NomVoie" id="NomVoie">
		<br></br>
		<label>Complément d'adresse : </label>
        <input type="text" class="champ" name="CompAdress" id="CompAdress">
		<label>Ville : </label>
        <input type="text" class="champ" name="Ville" id="Ville">	
		<br></br>
		<label>Code Postal : </label>
        <input type="text" class="champ" name="CodePostal" id="CodePostal" placeholder="00000">		
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

