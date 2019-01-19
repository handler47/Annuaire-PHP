<?php
/**
	* Classe SI permet la connexion à la BDD
*/
class SI {
	private $cnx ;
	private static $theSI;


	public function __construct() {
		$this->cnx = new PDO('mysql:host=127.0.0.1; dbname=annuaireBDD',
										'root', '',
										array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES latin1'));
		$this->cnx->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

		static::$theSI=$this; // memorisation au static
	}

	/**
		*Renvoie le Singleton
		@return mixed
	*/
	public static function getSI() {
		if (static::$theSI==null) {static::$theSI = new SI();}
		return static::$theSI;
	}

	/**
		*Prepare la requête via la connexion $cnx
		*@param mixed $req
		*@return mixed
	*/
	public function SGBDgetPrepare($req) {
		return $this->cnx->prepare($req);
	}

	/**
		*Prepare et Execute la requête $req en base
		*@param mixed $req
		*@return mixed
	*/	
	public function SGBDgetPrepareExecute($req) {
		$stmt = $this->SGBDgetPrepare($req);
		$stmt->execute() ;
		return $stmt ;
	}
	
}

?>