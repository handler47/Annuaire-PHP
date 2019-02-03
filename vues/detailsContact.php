
<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 05/01/2019
 * Time: 19:13
<<<<<<< Updated upstream
 */

?>


<div class="blockFormulaire">
    <?php foreach ($erreurs as $erreur){
        echo $erreur;
    }
    ?>
    <form method="post" action="index.php" class="">
        <h2>Récapitulatif du contact</h2>
        <?php
          $contact = Contact::mustFind($idContact);
          $contact->displayFormulaire()
        ?>

    </form>
</div>



