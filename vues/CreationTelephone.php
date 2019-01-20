<?php
?>

<form method="post" action="index.php" class="blockFormulaire">
    <h2>Création d'un téléphone</h2>
    <label>Type de téléphone</label>

    <?php
    $ListeTypeTel = new TypeTelephones();
    $ListeTypeTel->remplir();
    TypeTelephone::getInstances()->displaySelect('ss');

    ?>

    </br>
    <label>Prefixe</label>
    <input type="text" name="prefixe" placeholder="+33">
    <label>Numéro tel.</label>
    <input type="text" name="telephone" placeholder="0612545685">
    </br>
    <input type="submit" value="Submit">
</form>
