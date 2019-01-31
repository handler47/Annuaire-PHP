<?php

?>


<div class="blockFormulaire">
    <?php echo $erreur; ?>
    <?php echo $erreur2; ?>
    <form method="post" action="index.php" class="blockFormulaire">
    <h2>Création d'un téléphone</h2>
    <label>Type de téléphone</label>

    <?php
    $ListeTypeTel = new TypeTelephones();
    $ListeTypeTel->remplir();
    TypeTelephone::getInstances()->displaySelect('typeTel');

    ?>

    </br>
    <label>Numéro tel.</label>
    <input type="tel" class="champ" name="telephone" placeholder="0666225544">
    </br>
    <input class="boutonFormulaire" type="submit" value="Valider" id="boutonValider" name="Valider" class="bouton" />
</form>
</div>

<?php
// Transmission de la variable de session contenant l'id du contact
if (isset($_GET['ajouterNumero'])) {
    $_SESSION['ajouterNumero'] = $_GET['ajouterNumero'];
}

?>