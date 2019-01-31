<?php
/**
	* Classe Telephone
*/

class Telephone extends Element{
	//Singleton de mémorisation des instances
	private static $o_INSTANCES;
	public static function ajouterObjet($ligne){
		//créer (instancier) la liste si nécessaire
		if (static::$o_INSTANCES ==null){static::$o_INSTANCES = new Telephones();}
		//voir si l'objet existe avec la clef
		$tmp = static::$o_INSTANCES->getObject($ligne[static::champID()]);
		if($tmp!=null){return $tmp;}
		//n'existe pas : donc INSTANCIER Telephone et mémoriser
		$tmp = new Telephone($ligne);
		static::$o_INSTANCES->doAddObject($tmp);
		return $tmp;
	}
	
	//publication liste instances
	public static function getInstances(){
		if (static::$o_INSTANCES ==null){static::$o_INSTANCES = new Telephones();}
		return static::$o_INSTANCES;
	}
		
	// doit impérativement trouver la Telephone ayant pour id le paramètre
	public static function mustFind($id){
		if (static::$o_INSTANCES == null){static::$o_INSTANCES = new Telephones();}
		// regarder si instance existe
		$tmp = static::$o_INSTANCES->getObject($id);
		if($tmp!=null) {return $tmp;}
		//sinon pas trouver; chercher dans la BDD
		$req = static::getSELECT().' where T_numero =?';
		//echo "<br/>recherche $id";
		$ligne = SI::getSI()->SGBDgetLigne($req, $id);
		return static::ajouterObjet($ligne);
	}
	

	//---------- constructeur : repose sur le constructeur parent
	protected function __construct($theLigne) {parent::__construct($theLigne);}
	
	//---------- renvoie la valeur du champ spécifié en paramètre
	public function getNumero(){
		return $this->getField('T_numero');
	}
	
	public function getTypeTelID(){
		return $this->getField('T_TypeTelID');
	}
	
	public function getContactID(){
		return $this->getField('T_ContactID');
	}
	private $o_typeTelephone;

	public function getTypeTelephone(){
		if($this->o_typeTelephone == null){
			$this->o_typeTelephone = new TypeTelephones();
			$this->o_typeTelephone->remplir('TY_ID="'.$this->getTypeTelID().'"',null);
		}
		return $this->o_typeTelephone;
	}
	

	//affiche
	public function displayRow(){
		echo '<td align="center">'.$this->getNumero().'</td>';
	}

	public function displayInput($name){
		echo '<input class="champ" type="text" value="' . $this->getNumero() . '" id="bouton" name="' . $name . '" class="champ" />';
	}
	
	public function option(){
		$tmp = $this->getNumero();
		echo '<option value ="'.$tmp.'">';
		echo $this->getNumero();
		echo '</option>';

	}
	

	/******************************
	IMPORTANT : 	toute classe dérivée non abstraite doit avoir le code pour

	******************************/
	public static function champID() {return 'T_numero';}
	public static function getSELECT() {return 'SELECT T_numero,T_TypeTelID,T_ContactID FROM telephone';  }	

	public static function SQLInsert(array $valeurs){
		$req = 'INSERT INTO telephone (T_numero,T_TypeTelID,T_ContactID) VALUES(?,?,?)';
		return SI::getSI()->SGBDexecuteQuery($req,$valeurs);
	}
	
	public static function SQLDelete($valeur){
		$req = 'DELETE FROM telephone WHERE T_numero = ?';
		return SI::getSI()->SGBDexecuteQuery($req,array($valeur));
	}

	public static function SQLUpdate(array $valeurs, $condition = null){
		$req = 'UPDATE telephone SET T_numero = ? ';
		if ($condition != null)
			$req.= " WHERE $condition";
		print_r($req);
		return SI::getSI()->SGBDexecuteQuery($req,$valeurs);
	}

}


class Telephones extends Pluriel{

	//constructeur
	public function __construct(){
		parent::__construct();
	}
	
	public function remplir($condition=null, $ordre=null) {
		$req = Telephone::getSELECT();
		//ajouter condition si besoin est
		if ($condition != null) {
			$req.= " WHERE $condition"; // remplace $condition car guillemet et pas simple quote
		}
		if ($ordre != null){
			$req.=" ORDER BY $ordre";
		}
		$curseur = SI::getSI()->SGBDgetPrepareExecute($req);
		foreach ($curseur as $uneLigne){
			$this->doAddObject(Telephone::ajouterObjet($uneLigne));
		}
	}

	public function displayTableWithButton(){
		echo'<center>';
		echo '<p style="background-color: grey";>Téléphones</p>';
		echo'<ul style="list-style: none;">';

		// dire à chaque élément de mon tableau : afficher le row
		foreach ($this->getArray() as $untelephone) {
			echo '<li>';
			$TypeTelephone= $untelephone->getTypeTelephone()->displayTypeTel();
			echo '<label>Tel' . $TypeTelephone . '</label>';
			$untelephone->displayInput($TypeTelephone);
			echo '</li>';
		}
		echo'</ul>';
		echo'</center>';
	}

	public function displaySelect($name){
		echo'<select style="width:auto" class="form-control" type="Text" required="required" name="'.$name.'">';
		echo '<option>  </option>';
		// dire à chaque élément de mon tableau : afficher le row
		foreach ($this->getArray() as $untelephone) {
			$untelephone->option();
		}
		echo '</select>';
	}
	
}
?>
