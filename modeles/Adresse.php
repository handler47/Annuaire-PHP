<?php
/**
	* Classe Adresse
*/
class Adresse {
    private $ville;
    private $numRue;
    private $nomRue;
    private $codePostal;
    private $pays;

    public function __construct($pVille, $pNumRue, $pNomRue, $pCodePostal, $pPays)
    {
        $this->ville = $pVille;
        $this->numRue = $pNumRue;
        $this->nomRue = $pNomRue;
        $this->codePostal= $pCodePostal;
        $this->pays = $pPays;
    }
    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    /**
     * @return mixed
     */
    public function getNumRue()
    {
        return $this->numRue;
    }

    /**
     * @param mixed $numRue
     */
    public function setNumRue($numRue)
    {
        $this->numRue = $numRue;
    }

    /**
     * @return mixed
     */
    public function getNomRue()
    {
        return $this->nomRue;
    }

    /**
     * @param mixed $nomRue
     */
    public function setNomRue($nomRue)
    {
        $this->nomRue = $nomRue;
    }

    /**
     * @return mixed
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * @param mixed $codePostal
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;
    }

    /**
     * @return mixed
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * @param mixed $pays
     */
    public function setPays($pays)
    {
        $this->pays = $pays;
    }

    /**
     * Renvoie l'adresse sur une seule ligne.
     * @return string adresse
     */
    public function getAdresseInLine(){
        return $this->numRue . ' ' . $this->nomRue + ' ' . $this->codePostal . ' ' . $this->ville . ' ' + $this->pays;
    }
}