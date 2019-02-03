<?php

define("VCARD_VERSION",4.0);

/**
 * Classe représentation le contenu d'un fichier VCard et permettant son exportation çà partir
 * d'une fiche détaillé d'un Contact
 * Class VCard
 */
class VCard {


    var $nom;
    var $prenom;
    var $dateNaissance;
    var $societe;
    var $commentaire;
    var $adresse;
    var $telFixe;
    var $telPortable;
    var $telFaxe;
    var $telPersonnel;
    var $dir;
    var $dirDefault = "default";
    private $content;

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @param mixed $dateNaissance
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;
    }

    /**
     * @param mixed $societe
     */
    public function setSociete($societe)
    {
        $this->societe = $societe;
    }

    /**
     * @param mixed $commentaire
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @param mixed $telFixe
     */
    public function setTelFixe($telFixe)
    {
        $this->telFixe = $telFixe;
    }

    /**
     * @param mixed $telPortable
     */
    public function setTelPortable($telPortable)
    {
        $this->telPortable = $telPortable;
    }

    /**
     * @param mixed $telFaxe
     */
    public function setTelFaxe($telFaxe)
    {
        $this->telFaxe = $telFaxe;
    }

    /**
     * @param mixed $telPersonnel
     */
    public function setTelPersonnel($telPersonnel)
    {
        $this->telPersonnel = $telPersonnel;
    }

    /**
     * Définition du chemin où sera créé le vCard
     * @param $rep
     */
    public function setRepDowload($rep){
        $this->dir = $rep;
    }
    function vCard($repDownload= '', $lang = ''){
        // si le chemin entré est correct on le choisi sinon on en choisi un autre par défaut;
        $this->dir = strlen(trim($repDownload)) > 0 ? $repDownload : $this->dirDefault;
    }

    /**
     * Fonctions permettant la génération du contenu du VCard et de la génération du fichier en lui-même
     */

    function createDownloadDir(){
        if (!is_dir($this->dir)){
            if (!mkdir()){
                
            }
        }
    }

    public function writeContentVCard(){
        $this->content = (String) "BEGIN:VCARD\r\n";
        $this->content .= (String) "VERSION:" . VCARD_VERSION . "\r\n";
        $this->content .= (String) "N;ENCODING=QUOTED-PRINTABLE:$this->nom;$this->prenom\r\n";
        $this->content .= (String) "FN;ENCODING=QUOTED-PRINTABLE:$this->nom;$this->prenom\r\n";
        $this->content .= (String) "ORG;ENCODING=QUOTED-PRINTABLE:$this->societe\r\n";
        $this->content .= (String) "TEL;TYPE=fixe,voice;VALUE=uri:tel:$this->telFixe\r\n";
        $this->content .= (String) "TEL;TYPE=faxe,voice;VALUE=uri:tel:$this->telFaxe\r\n";
        $this->content .= (String) "TEL;TYPE=personnel,voice;VALUE=uri:tel:$this->telPersonnel\r\n";
        $this->content .= (String) "TEL;TYPE=portable,voice;VALUE=uri:tel:$this->telPortable\r\n";
        $this->content .= (String) "ADR;TYPE=HOME;LABEL=$this->adresse\r\n";
        $this->content .= (String) "BDAY:$this->dateNaissance\r\n";
        $this->content .= (String) "END:VCARD\r\n";


    }




}