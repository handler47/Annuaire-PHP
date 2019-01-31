
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
    <?php echo $erreur; ?>
    <form method="post" action="index.php" class="">
        <h2>Récapitulatif du contact</h2>
        <?php
          $contact = Contact::mustFind($idContact);
          $contact->displayFormulaire()
        ?>

    </form>
</div>

<?php
// Transmission de la variable de session contenant l'id du contact


?>


