<?php
/**
	* Classe Pays
*/
class Pays extends Element{
	//Singleton de mémorisation des instances
	private static $o_INSTANCES;
	public static function ajouterObjet($ligne){
		//créer (instancier) la liste si nécessaire
		if (static::$o_INSTANCES ==null){static::$o_INSTANCES = new ListPays();}
		//voir si l'objet existe avec la clef
		$tmp = static::$o_INSTANCES->getObject($ligne[static::champID()]);
		if($tmp!=null){return $tmp;}
		//n'existe pas : donc INSTANCIER Adresse et mémoriser
		$tmp = new Pays($ligne);
		static::$o_INSTANCES->doAddObject($tmp);
		return $tmp;
	}
	
	//publication liste instances
	public static function getInstances(){
		if (static::$o_INSTANCES ==null){static::$o_INSTANCES = new ListPays();}
		return static::$o_INSTANCES;
	}
		
	// doit impérativement trouver la Telephone ayant pour id le paramètre
	public static function mustFind($id){
		if (static::$o_INSTANCES == null){static::$o_INSTANCES = new ListPays();}
		// regarder si instance existe
		$tmp = static::$o_INSTANCES->getObject($id);
		if($tmp!=null) {return $tmp;}
		//sinon pas trouver; chercher dans la BDD
		$req = static::getSELECT().' where P_ID =?';
		//echo "<br/>recherche $id";
		$ligne = SI::getSI()->SGBDgetLigne($req, $id);
		return static::ajouterObjet($ligne);
	}
	

	//---------- constructeur : repose sur le constructeur parent
	protected function __construct($theLigne) {parent::__construct($theLigne);}
	
	//---------- renvoie la valeur du champ spécifié en paramètre
	public function getID(){
		return $this->getField('P_ID');
	}
	
	public function getNom(){
		return $this->getField('P_Nom');
	}
	
	//affiche
	public function displayRow(){
		echo '<td align="center">'.$this->getNom().'</td>';

	}
	
	public function option(){
		$tmp = $this->getID();
		echo '<option value ="'.$tmp.'">';
		echo utf8_encode ($this->getNom());
		echo '</option>';
	}
	

	/******************************
	IMPORTANT : 	toute classe dérivée non abstraite doit avoir le code pour

	******************************/
	public static function champID() {return 'P_ID';}
	public static function getSELECT() {return 'SELECT P_ID,P_Nom FROM Pays';  }	


}


class ListPays extends Pluriel{

	//constructeur
	public function __construct(){
		parent::__construct();
	}
	
	public function remplir($condition=null, $ordre=null) {
		$req = Pays::getSELECT();
		//ajouter condition si besoin est
		if ($condition != null) {
			$req.= " WHERE $condition"; // remplace $condition car guillemet et pas simple quote
		}
		if ($ordre != null){
			$req.=" ORDER BY $ordre";
		}
		$curseur = SI::getSI()->SGBDgetPrepareExecute($req);
		foreach ($curseur as $uneLigne){
			$this->doAddObject(Pays::ajouterObjet($uneLigne));
		}
	}

	public function RechercheID(){
		foreach ($this->getArray() as $uncontact) {
			return $uncontact->getID();
		}
	}


	
	public function displayTable(){
		// dire à chaque élément de mon tableau : afficher le row
		foreach ($this->getArray() as $unpays) {
			$unpays->displayRow();
		}
	}

	public function displaySelect($name, $selection = null){
		echo'<select style="width:auto" class="form-control"  type="Text" required="required" name="'.$name.'">';
		if ($selection == null)
			echo '<option selected="selected">pas de sélection</option>';
		else
			echo '<option selected="selected">' . $selection . '</option>';

		print_r("TESTTTT");

		 /**
		 * Evite de devoir tester pour chaque occurence du tableau de pays.
		 */
		$paysList = $this->getArray();

		$listeContacts = new ListPays();
		$listeContacts->remplir("P_Nom = " . $selection, "DESC Limit 1");
		$paysId = Pays::getInstances()->RechercheID();
		print_r($paysId);
		$pays = $this->getObject($paysId);
		$indexPaysASelectionner = array_search($pays, $paysList);
		var_dump($paysList);
		unset($paysList[$indexPaysASelectionner]);

		// dire à chaque élément de mon tableau : afficher le row
		foreach ($paysList as $unpays) {
			$unpays->option();
		}
		echo '</select>';
	}
	
}
?>
