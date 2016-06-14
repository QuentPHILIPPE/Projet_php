<?php
class Utilisateur {
	public $adresseMail, $pseudo, $mdpU;
  
	/*//Constructeur
  function __construct($email,$mdpU,$pseudo,$nomU,$prenomU) {
   	$this->email = $email;
		$this->mdpU = $mdpU;
		$this->pseudo = $pseudo;
    $this->nomU = $nomU;
    $this->prenomU = $prenomU;
  }*/
  function __toString() {
    return $this->pseudo;
  }
	//Getteurs
	 
	public function getEmail() {
		return $this->adresseMail;
	}
	public function getMdp() {
		return $this->mdpU;
	}
	
	//Setteurs 
 
	public function setEmail($mail) {
		$this->adresseMail = $mail;
	}
	public function setMdp($mdp) {
		return $this->mdpU = $mdp; 
	}
  public function setPseudo($p) {
    $this->pseudo = $p;
  }
	
	public static function getFromPseudo( $pseudo ) {
		$db = Database::getInstance();
		$sql = "SELECT * FROM utilisateur WHERE pseudo =:pseudo";
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Utilisateur");
		$stmt->execute(array(":pseudo" => $pseudo));
		return $stmt->fetch();
	}
	public static function getList() {
		$db = Database::getInstance();
		$sql = "SELECT * FROM utilisateur";
		$stmt = $db->query($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Utilisateur");
		return $stmt->fetchAll();
	}
	
}

?>