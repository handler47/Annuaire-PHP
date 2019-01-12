<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 05/01/2019
 * Time: 20:15
<<<<<<< Updated upstream
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
