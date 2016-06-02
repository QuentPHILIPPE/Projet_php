<?php

class Contact extends Model {
	public $id, $nom, $prenom, $adresseMail;
	public static function setFromId( $id,$data ) {                                                                                                  
		$db = Database::getInstance();
		$sql = "UPDATE Utilisateur set nom=:nom,prenom=:prenom,adresseMail=:adresseMail WHERE id = :id";
		$stmt = $db->prepare($sql);
		//$stmt->setFetchMode(PDO::FETCH_CLASS, "Contact");
		return $stmt->execute(array(
			":id" => $id,
			":nom"=>$data['nom'],
			":prenom"=>$data['prenom'],
			":adresseMail"=>$data['adresseMail']));
		//return $stmt->fetch();
	}
	public function toHTML()
	{
		return ($this->prenom)." ".($this->nom);
	}
	public static function getFromId( $id ) {
		$db = Database::getInstance();
		$sql = "SELECT * FROM Utilisateur WHERE idU = :idU";
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Contact");
		$stmt->execute(array(":idU" => $id));
		return $stmt->fetch();
	}

	public static function getList() {
		$db = Database::getInstance();
		$sql = "SELECT * FROM Utilisateur";
		$stmt = $db->query($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Contact");
		return $stmt->fetchAll();
	}
}
?>


