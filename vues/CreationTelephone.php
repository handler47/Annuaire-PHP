<?php
?>

<div class="blockFormulaire">
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
    <input type="tel" placeholder="0666225544">
    </br>
    <input class="boutonFormulaire" type="submit" value="Valider" id="boutonValider" name="Valider" class="bouton" />
</form>
</div>