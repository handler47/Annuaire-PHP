<?php
/**
	* Classe TypesTelephone
*/

class TypeTelephone extends Element{
	//Singleton de mémorisation des instances
	private static $o_INSTANCES;
	public static function ajouterObjet($ligne){
		//créer (instancier) la liste si nécessaire
		if (static::$o_INSTANCES ==null){static::$o_INSTANCES = new TypeTelephones();}
		//voir si l'objet existe avec la clef
		$tmp = static::$o_INSTANCES->getObject($ligne[static::champID()]);
		if($tmp!=null){return $tmp;}
		//n'existe pas : donc INSTANCIER TypeTelephone et mémoriser
		$tmp = new TypeTelephone($ligne);
		static::$o_INSTANCES->doAddObject($tmp);
		return $tmp;
	}

	//publication liste instances
	public static function getInstances(){
		if (static::$o_INSTANCES ==null){static::$o_INSTANCES = new TypeTelephones();}
		return static::$o_INSTANCES;
	}

	// doit impérativement trouver la TypeTelephone ayant pour id le paramètre
	public static function mustFind($id){
		if (static::$o_INSTANCES == null){static::$o_INSTANCES = new TypeTelephones();}
		// regarder si instance existe
		$tmp = static::$o_INSTANCES->getObject($id);
		if($tmp!=null) {return $tmp;}
		//sinon pas trouver; chercher dans la BDD
		$req = static::getSELECT().' where TY_ID =?';
		$ligne = SI::getSI()->SGBDgetLigne($req, $id);
		return static::ajouterObjet($ligne);
	}
	

	//---------- constructeur : repose sur le constructeur parent
	protected function __construct($theLigne) {parent::__construct($theLigne);}
	
	//---------- renvoie la valeur du champ spécifié en paramètre
	public function getID(){
		return $this->getField('TY_ID');
	}

	public function getTypeTel(){
		return $this->getField('TY_TYPETEL');
	}

	//affiche
	public function displayID(){
		return $this->getID();

	}
	
	 public function option(){
		 $tmp = $this->getID();
		 echo '<option value ="'.$tmp.'">';
		 echo $this->getTypeTel();
		 echo '</option>';
	 }
	

	/******************************
	IMPORTANT : 	toute classe dérivée non abstraite doit avoir le code pour

	******************************/
	public static function champID() {
		return 'TY_ID';
	}
	
	public static function getSELECT() {
		return 'SELECT TY_ID, TY_TYPETEL FROM type_telephone';
	}

}

class TypeTelephones extends Pluriel{

	//constructeur
	public function __construct(){
		parent::__construct();
	}

	public function getArrays() {return $this->getArray();}

	public function remplir($condition=null, $ordre=null) {
		$req = TypeTelephone::getSELECT();
		//ajouter condition si besoin est
		if ($condition != null) {
			$req.= " WHERE $condition"; // remplace $condition car guillemet et pas simple quote
		}
		if ($ordre != null){
			$req.=" ORDER BY $ordre";
		}
		$curseur = SI::getSI()->SGBDgetPrepareExecute($req);
		foreach ($curseur as $uneLigne){
			$this->doAddObject(TypeTelephone::ajouterObjet($uneLigne));
		}
	}

	public function displayTypeTel(){
		foreach ($this->getArray() as $unTypeTel) {
			return $unTypeTel->getTypeTel();
		}
	}
	
	
	public function displayIDTypeTel(){
		// dire à chaque élément de mon tableau : afficher le row
		foreach ($this->getArray() as $unTypeTelephone) {
			return $unTypeTelephone->displayID();
		}
	}

	public function displaySelect($name){
		echo'<select style="width:auto" class="form-control" type="Text" required="required" name="'.$name.'">';
		//echo '<option>  </option>';
		print_r($name);
		// dire à chaque élément de mon tableau : afficher le row
		foreach ($this->getArray() as $unTypeTelephone) {
			$unTypeTelephone->option();
		}
		echo '</select>';
	}
	
}

?>

