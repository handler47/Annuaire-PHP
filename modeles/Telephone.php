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
}
