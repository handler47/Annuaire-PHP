<?php
//----------------------------------------------
//             Classe SI pour Acces BDD
//----------------------------------------------
class SI {
	private $cnx ;
	private static $theSI;

<<<<<<< Updated upstream
	//---------- CONSTRUCTEUR PRIVATE
	private function __construct() {
		$this->cnx = new PDO('mysql:host=127.0.0.1; dbname=annuaireBDD',
										'root', '',
										array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES latin1'));
		$this->cnx->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

		static::$theSI=$this; // memorisation au static
	}
=======
$serverName = "127.0.0.1";
$username = "root@localhost";
$password = "";
$dbName = "annuaire";

/** Récupère une instance PDO pour se connecter au serveur MySql
 * @return PDO
 */
function getConnection()
{
    global $serverName, $username, $password, $dbName;
>>>>>>> Stashed changes

	//---------- renvoie le SI Singleton
	public static function getSI() {
		if (static::$theSI==null) {static::$theSI = new SI();}
		return static::$theSI;
	}

	public function SGBDgetPrepare($req) {
		return $this->cnx->prepare($req);
	}
	
	public function SGBDgetPrepareExecute($req) {
		$stmt = $this->SGBDgetPrepare($req);
		$stmt->execute() ;
		return $stmt ;
	}
	
}

?>