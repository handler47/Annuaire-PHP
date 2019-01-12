<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 05/01/2019
 * Time: 19:52
<<<<<<< Updated upstream
 */


class Contact {
    private $nom;
    private $prenom;
    private $societe;
    private $adresse;
    private $dateNaissance;
    private $commentaire;

public function __construct($pNom, $pPrenom, $pSociete, $pAdresse, $pDateNaissance, $pCommentaire)
{
    $this->nom = $pNom;
    $this->prenom = $pPrenom;
    $this->societe = $pSociete;
    $this->adresse = $pAdresse;
    $this->dateNaissance = $pDateNaissance;
    $this->commentaire = $pCommentaire;
}
}
