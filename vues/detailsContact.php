
<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 05/01/2019
 * Time: 19:13
<<<<<<< Updated upstream
 */
?>

        <h2>Récapitulatif du contact</h2>
        <?php
		//Voilà l'id contact sur lequel on click au formulaire listContact !!
		$IDContact = $_GET["IDContact"];
		
		
		echo $IDContact;
        if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['societe']) && isset($_POST['adresse']) && isset($_POST['dateNaissance']) && isset($_POST['commentaire'])) {
        // on affiche nos résultats
        ?>
            <p>Nom/Prénom : <?php echo $_POST['nom'] . ' ' . $_POST['prenom'];?></p>
            <p>Societe : <?php echo $_POST['societe']; ?> </p>
            <!-- on retourne l'adresse sous la forme d'une seule ligne (méthode classe Adresse -->
            <p>Adresse : <?php echo $_POST['adresse'];?> </p>
            <p>Date naissance : <?php echo $_POST['dateNaissance'];?> </p>
            <p>Commentaire : <?php echo $_POST['commentaire'];?> </p>

        <?php
        }
        ?>

