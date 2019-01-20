<?php
/**
	* Classe Contact
*/

class Contact extends Element{
	//Singleton de mémorisation des instances
	private static $o_INSTANCES;
	public static function ajouterObjet($ligne){
		//créer (instancier) la liste si nécessaire
		if (static::$o_INSTANCES ==null){static::$o_INSTANCES = new Contacts();}
		//voir si l'objet existe avec la clef
		$tmp = static::$o_INSTANCES->getObject($ligne[static::champID()]);
		if($tmp!=null){return $tmp;}
		//n'existe pas : donc INSTANCIER Contact et mémoriser
		$tmp = new Contact($ligne);
		static::$o_INSTANCES->doAddObject($tmp);
		return $tmp;
	}
	
	//publication liste instances
	public static function getInstances(){
		if (static::$o_INSTANCES ==null){static::$o_INSTANCES = new Contacts();}
		return static::$o_INSTANCES;
	}
		
	// doit impérativement trouver la Contact ayant pour id le paramètre
	public static function mustFind($id){
		if (static::$o_INSTANCES == null){static::$o_INSTANCES = new Contacts();}
		// regarder si instance existe
		$tmp = static::$o_INSTANCES->getObject($id);
		if($tmp!=null) {return $tmp;}
		//sinon pas trouver; chercher dans la BDD
		$req = static::getSELECT().' where C_ID =?';
		//echo "<br/>recherche $id";
		$ligne = SI::getSI()->SGBDgetLigne($req, $id);
		return static::ajouterObjet($ligne);
	}
	
	private $o_MesElecteurs;
	//---------- constructeur : repose sur le constructeur parent
	protected function __construct($theLigne) {parent::__construct($theLigne);}
	
	//---------- renvoie la valeur du champ spécifié en paramètre
	public function getID(){
		return $this->getField('C_ID');
	}
	
	public function getNom(){
		return $this->getField('C_Nom');
	}
	
	
	public function getPrenom(){
		return $this->getField('C_Prenom');
	}
	
	
	public function getDateNais(){
		return $this->getField('C_DateNais');
	}
	
	public function getSociete(){
		return $this->getField('C_Societe');
	}
	
	
	public function getCommentaire(){
		return $this->getField('C_Commentaire');
	}

	private $o_MesTelephones;
	// fait office de clef etrangères 
	// permet d'avoir les telephone du contact Wesh :)
	public function getTelephones(){
		if($this->o_MesTelephones == null){
			$this->o_MesTelephones = new Telephones();
			$this->o_MesTelephones->remplir('T_ContactID="'.$this->getID().'"',null);
		}
		return $this->o_MesTelephones;
	}
	
	
	//affiche
	public function displayRow(){
		echo '<tr>';
		echo '<td align="center">'.$this->getNom().' '.$this->getPrenom().'</td>';
		//EXEMPLE D'affichage des telephone d'un contact affiche le display classe telephone ( celui ci affiche le numero de tel)
		echo '<td align="center">'.$this->getTelephones()->displayTable().'</td>';
		//hidden permet de récup l'id Contact par click bouton pour l'autre page : detailsContact
		echo '<td align="center"><input type="hidden" name="IDContact" value='.$this->getID().'> <input id="details" type="submit" value=details name="details" class="button" /> </td>';
		echo '</tr>';
	}
	
	public function option(){
		$tmp = $this->getID();
		echo '<option value ="'.$tmp.'">';
		echo $this->getNom();
		echo '</option>';

	}
	

	/******************************
	IMPORTANT : 	toute classe dérivée non abstraite doit avoir le code pour

	******************************/
	public static function champID() {
		return 'C_ID';
	}
	
	public static function getSELECT() {
		return 'SELECT C_ID, C_Nom, C_Prenom, C_DateNais, C_AdresseID, C_Societe, C_Commentaire FROM contact '; 
	}	

	//l'équivalent du DAO
	
	public static function SQLInsert(array $valeurs){
		$req = 'INSERT INTO contact (C_Nom,C_Prenom,C_DateNais,C_AdresseID,C_Societe,C_Commentaire) VALUES(?,?,?,?,?,?)';
		return SI::getSI()->SGBDexecuteQuery($req,$valeurs);
	}
	
	public static function SQLDelete($valeur){
		$req = 'DELETE FROM divis WHERE C_ID = ?';
		return SI::getSI()->SGBDexecuteQuery($req,array($valeur));
	}

}

class Contacts extends Pluriel{

	//constructeur
	public function __construct(){
		parent::__construct();
	}
	

	public function remplir($condition=null, $ordre=null) {
		$req = Contact::getSELECT();
		//ajouter condition si besoin est
		if ($condition != null) {
			$req.= " WHERE $condition"; // remplace $condition car guillemet et pas simple quote
		}
		if ($ordre != null){
			$req.=" ORDER BY $ordre";
		}
		$curseur = SI::getSI()->SGBDgetPrepareExecute($req);
		//var_dump($curseur);
		foreach ($curseur as $uneLigne){
			$this->doAddObject(Contact::ajouterObjet($uneLigne));
		}
	}
	
	public function displayTable(){
		echo'<center>';
		echo'<table align="center" class="table"  frame="hsides" >';
		// dire à chaque élément de mon tableau : afficher le row
		foreach ($this->getArray() as $uncontact) {
			$uncontact->displayRow();
		}
		echo'</table>';
		echo'</center>';
	}

	public function displaySelect($name){
		echo'<select style="width:auto" class="form-control" type="Text" required="required" name="'.$name.'">';
		echo '<option>  </option>';
		// dire à chaque élément de mon tableau : afficher le row
		foreach ($this->getArray() as $uncontact) {
			$uncontact->option();
		}
		echo '</select>';
	}
	
}

?>



