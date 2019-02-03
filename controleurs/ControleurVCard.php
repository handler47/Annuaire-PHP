<?php

/**
 * Classe permettant de récupérer tout les attribut du contact pour la génération du VCard
 */


include_once('class.vCard.inc.php');
$vCard = new VCard('');
// on récupère l'id du contact pour récupérer ses attribut
$contactId = $_SESSION['IDContact'];
$contact = Contact::mustFind($contactId);

$nomContact = $contact->getNom();
$prenomContact = $contact->getPrenom();
$societe = $contact->getSociete();
$commentaire = $contact->getCommentaire();
$dateNaiss = $contact->getDateNais();
$adresse = $contact->getMonAdresse()->displayFormatedAdresse();

/**
 * Téléphones
 */


$vCard->setNom();
$vCard->setPrenom();
$vCard->setAdresse();
$vCard->setCommentaire();
$vCard->setDateNaissance();
$vCard->setSociete();
$vCard->setTelFaxe();
$vCard->setTelFixe();
$vCard->setTelPersonnel();
$vCard->setTelPortable();


/*
OR
header('Content-Type: text/x-vcard');
header('Content-Disposition: inline; filename=vCard_' . date('Y-m-d_H-m-s') . '.vcf');
echo $vCard->getCardOutput();
*/
$vCard->writeVCardFile();
header('Location:' . $vCard->getCardFilePath());
exit;

?>
