<?php
/**
	* Classe Adresse
*/
class Adresse extends Element{
	//Singleton de mémorisation des instances
	private static $o_INSTANCES;
	public static function ajouterObjet($ligne){
		//créer (instancier) la liste si nécessaire
		if (static::$o_INSTANCES ==null){static::$o_INSTANCES = new Adresses();}
		//voir si l'objet existe avec la clef
		$tmp = static::$o_INSTANCES->getObject($ligne[static::champID()]);
		if($tmp!=null){return $tmp;}
		//n'existe pas : donc INSTANCIER Adresse et mémoriser
		$tmp = new Adresse($ligne);
		static::$o_INSTANCES->doAddObject($tmp);
		return $tmp;
	}
	
	//publication liste instances
	public static function getInstances(){
		if (static::$o_INSTANCES ==null){static::$o_INSTANCES = new Adresses();}
		return static::$o_INSTANCES;
	}
		
	// doit impérativement trouver la Telephone ayant pour id le paramètre
	public static function mustFind($id){
		if (static::$o_INSTANCES == null){static::$o_INSTANCES = new Adresses();}
		// regarder si instance existe
		$tmp = static::$o_INSTANCES->getObject($id);
		if($tmp!=null) {return $tmp;}
		//sinon pas trouver; chercher dans la BDD
		$req = static::getSELECT().' where A_ID =?';
		//echo "<br/>recherche $id";
		$ligne = SI::getSI()->SGBDgetLigne($req, $id);
		return static::ajouterObjet($ligne);
	}
	

	//---------- constructeur : repose sur le constructeur parent
	protected function __construct($theLigne) {parent::__construct($theLigne);}
	
	//---------- renvoie la valeur du champ spécifié en paramètre
	public function getID(){
		return $this->getField('A_ID');
	}
	
	public function getNumVoie(){
		return $this->getField('A_NumVoie');
	}
	
	public function getNomVoie(){
		return $this->getField('A_NomVoie');
	}
	
	public function getComplementAdresse(){
		return $this->getField('A_ComplementAdresse');
	}
	
	public function getVille(){
		return $this->getField('A_Ville');
	}
	
	public function getCodePostal(){
		return $this->getField('A_CodePostal');
	}
	
	
	//affiche
	public function displayRow(){
		echo '<td align="center">'.$this->getNumVoie().'</td>';
		echo '<td align="center">'.$this->getNomVoie().'</td>';
		echo '<td align="center">'.$this->getVille().'</td>';
		echo '<td align="center">'.$this->getCodePostal().'</td>';
	}
	

	/******************************
	IMPORTANT : 	toute classe dérivée non abstraite doit avoir le code pour

	******************************/
	public static function champID() {return 'A_ID';}
	public static function getSELECT() {return 'SELECT A_ID,A_NumVoie,A_NomVoie,A_ComplementAdresse,A_Ville,A_CodePostal FROM adresse';  }	

	public static function SQLInsert(array $valeurs){
		$req = 'INSERT INTO adresse (A_NumVoie,A_NomVoie,A_ComplementAdresse,A_Ville,A_CodePostal,A_PaysID) VALUES(?,?,?,?,?,?)';
		return SI::getSI()->SGBDexecuteQuery($req,$valeurs);
	}
	
	public static function SQLDelete($valeur){
		$req = 'DELETE FROM adresse WHERE A_ID = ?';
		return SI::getSI()->SGBDexecuteQuery($req,array($valeur));
	}

}


class Adresses extends Pluriel{

	//constructeur
	public function __construct(){
		parent::__construct();
	}
	
	public function remplir($condition=null, $ordre=null) {
		$req = Adresse::getSELECT();
		//ajouter condition si besoin est
		if ($condition != null) {
			$req.= " WHERE $condition"; // remplace $condition car guillemet et pas simple quote
		}
		if ($ordre != null){
			$req.=" ORDER BY $ordre";
		}
		$curseur = SI::getSI()->SGBDgetPrepareExecute($req);
		foreach ($curseur as $uneLigne){
			$this->doAddObject(Adresse::ajouterObjet($uneLigne));
		}
	}
	
	public function displayTable(){
		// dire à chaque élément de mon tableau : afficher le row
		foreach ($this->getArray() as $uneadresse) {
			$uneadresse->displayRow();
		}
	}
	
	public function displayAdresse(){
		foreach ($this->getArray() as $uneadresse) {
			return $uneadresse->getID();
		}
	}

	public function displaySelect($name){
		echo'<select style="width:auto" class="form-control" type="Text" required="required" name="'.$name.'">';
		echo '<option>  </option>';
		// dire à chaque élément de mon tableau : afficher le row
		foreach ($this->getArray() as $uneadresse) {
			$uneadresse->option();
		}
		echo '</select>';
	}
	
}
?>
