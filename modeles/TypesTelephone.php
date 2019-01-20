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
	
	private $o_MesElecteurs;
	//---------- constructeur : repose sur le constructeur parent
	protected function __construct($theLigne) {parent::__construct($theLigne);}
	
	//---------- renvoie la valeur du champ spécifié en paramètre
	public function getID(){
		return $this->getField('Ty_ID');
	}
	
	public function getPortable(){
		return $this->getField('TY_Portable');
	}
	
	
	public function getFixe(){
		return $this->getField('TY_Fixe');
	}
	
	
	public function getProfessionnel(){
		return $this->getField('TY_Professionnel');
	}
	
	public function getInternationnal(){
		return $this->getField('TY_Internationnal');
	}
	
	
	public function getFax(){
		return $this->getField('TY_Fax');
	}



	//affiche
	public function displayRow(){
		echo '<tr>';
		echo '<td align="center">'.$this->getID().'</td>';
		echo '</tr>';
	}
	
	// public function option(){
		// $tmp = $this->getID();
		// echo '<option value ="'.$tmp.'">';
		// echo $this->get();
		// echo '</option>';
	// }
	

	/******************************
	IMPORTANT : 	toute classe dérivée non abstraite doit avoir le code pour

	******************************/
	public static function champID() {
		return 'TY_ID';
	}
	
	public static function getSELECT() {
		return 'SELECT TY_ID, TY_Portable, TY_Fixe, TY_Professionnel, TY_Internantionnal, TY_Fax FROM TypeTelephone '; 
	}	
	
	public static function SQLInsert(array $valeurs){
		$req = 'INSERT INTO TypeTelephone (TY_Portable, TY_Fixe, TY_Professionnel, TY_Internantionnal, TY_Fax) VALUES(?,?,?,?,?)';
		return SI::getSI()->SGBDexecuteQuery($req,$valeurs);
	}
	
	public static function SQLDelete($valeur){
		$req = 'DELETE FROM TypeTelephone WHERE TY_ID = ?';
		return SI::getSI()->SGBDexecuteQuery($req,array($valeur));
	}

}

class TypeTelephones extends Pluriel{

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
		foreach ($curseur as $uneLigne){
			$this->doAddObject(Contact::ajouterObjet($uneLigne));
		}
	}
	
	public function displayTable(){
		echo'<center>';
		echo'<table align="center" class="table"  frame="hsides" >';
		// dire à chaque élément de mon tableau : afficher le row
		foreach ($this->getArray() as $unTypeTelephone) {
			$unTypeTelephone->displayRow();
		}
		echo'</table>';
		echo'</center>';
	}

	public function displaySelect($name){
		echo'<select style="width:auto" class="form-control" type="Text" required="required" name="'.$name.'">';
		echo '<option>  </option>';
		// dire à chaque élément de mon tableau : afficher le row
		foreach ($this->getArray() as $unTypeTelephone) {
			$unTypeTelephone->option();
		}
		echo '</select>';
	}
	
}

?>

