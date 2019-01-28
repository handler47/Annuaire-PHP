
<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 05/01/2019
 * Time: 19:13
<<<<<<< Updated upstream
 */


$idContact  = $_GET['details'];
$contacts = new Contacts();
$contact= Contact::mustFind($idContact);
$nomContact = $contact->getNom();
$prenomContact = $contact->getPrenom();
$dateNaiss = $contact->getDateNais();
$societe = $contact->getSociete();
$commentaire = $contact->getCommentaire();

$adresseContact = $contact->getAdresseID();
$adresseFounded = Adresse::mustFind($adresseContact);
$numVoie = $adresseFounded->getNumVoie();
$nomVoie = $adresseFounded->getNomVoie();
$cmptAdresse = $adresseFounded->getComplementAdresse();
$ville = $adresseFounded->getVille();
$codePostal = $adresseFounded->getCodePostal();

$adresses = new Adresses();
$adresses->remplir();

$pays = Pays::mustFind($adresseFounded->getPaysID());
$paysNom = $pays->getNom();
?>

        <h2>Récapitulatif du contact</h2>

       <div class="blockFormulaire">
	<?php echo $erreur; ?>
	<form method="post" action="index.php" class="">
		<h2>Creation d'un Contact</h2>
		<label>Nom : </label>
        <input type="text" class="champ" name="Nom" id="Nom" placeholder="<?php echo $nomContact ?>" autofocus>
		<label>Prénom : </label>
        <input type="text" class="champ" name="Prenom" id="Prenom" placeholder="<?php echo $prenomContact ?>">
		</br>
		</br>
		<label>Numero de la voie : </label>
        <input type="number" class="champ" name="NumVoie" id="NumVoie" placeholder="<?php echo $numVoie ?>">
		</br>
		<label>Nom de la voie : </label>
        <input type="text" class="champ" name="NomVoie" id="NomVoie" placeholder="<?php echo $nomVoie ?>">
		</br>
		<label>Complément d'adresse : </label>
        <Textarea  type="textera" name="ComplAdresse"  id="ComplAdresse" rows=1 cols=30 wrap=physical placeholder="<?php echo $cmptAdresse ?>"></Textarea>
		</br>
		<label>Ville : </label>
        <input type="text" class="champ" name="Ville" id="Ville" placeholder="<?php echo $ville ?>">
		<label>Code Postal : </label>
        <input type="text" class="champ" name="CodePostal" id="CodePostal" placeholder="<?php echo $codePostal ?>">
		</br>
		<label>Pays : </label>
		<?php
	    $ListePays = new ListPays();
    	$ListePays->remplir(null,"P_Nom ASC");
		Pays::getInstances()->displaySelect("Pays",$paysNom);
		?>
		<label>Societe : </label>
        <input type="text" class="champ" name="Societe" id="Societe" placeholder="<?php echo $societe ?>">
		<Textarea  type="textera" name="Commentaire" id="Commentaire" rows=2 cols=40 wrap=physical placeholder="<?php echo $commentaire ?>"></Textarea>
		<br></br>
		<input class="boutonFormulaire" type="submit" value="Valider" id="boutonValider" name="Valider" class="bouton" />
	</form>
</div>



