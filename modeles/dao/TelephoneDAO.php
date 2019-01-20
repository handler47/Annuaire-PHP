<?php
/**
 * Classe d'accès aux données relatives au telephones
*/

class TelephoneDAO{

    public function __construct(){

        $this->si = new SI();
    }

    /**
     * Retourne les différents types de téléphone (fixe, portable, fax, personnel ou autres)
     */
    public function getTypeTelephones(){
        $sql=  "SELECT Nom FROM TypeTelephone";
        $result = SI::getSI()->SGBDgetPrepareExecute($sql);
        //$resultFetch = $result->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}