<?php
/**
	* Classe Telephone
*/

class Telephone {
    private $typeNumero;
    private $prefixe;
    private $numero;

    public function __construct($pTypeNumero, $pPrefixe, $pNumero)
    {
        $this->typeNumero = $pTypeNumero;
        $this->prefixe = $pPrefixe;
        $this->numero = $pNumero;
    }
    
    /**
     * @return mixed
     */
    public function getTypeNumero()
    {
        return $this->typeNumero;
    }

    /**
     * @param mixed $typeNumero
     */
    public function setTypeNumero($typeNumero)
    {
        $this->typeNumero = $typeNumero;
    }

    /**
     * @return mixed
     */
    public function getPrefixe()
    {
        return $this->prefixe;
    }

    /**
     * @param mixed $prefixe
     */
    public function setPrefixe($prefixe)
    {
        $this->prefixe = $prefixe;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }


}
