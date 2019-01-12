<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 05/01/2019
 * Time: 20:07
<<<<<<< Updated upstream
 */


class Adresse {
    private $numRue;
    private $nomRue;
    private $codePostal;
    private $pays;

    public function __construct($pNumRue, $pNomRue, $pCodePostal, $pPays)
    {
        $this->numRue = $pNomRue;
        $this->nomRue = $pNomRue;
        $this->codePostal= $pCodePostal;
        $this->pays = $pPays;
    }
}