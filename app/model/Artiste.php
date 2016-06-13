<?php 

class Artiste {
    public $idArtiste;
    public $nomArtiste; //string
    public $lienWiki; //string
 /*   
    function __construct($nom,$lien)    {
        $this->idArtiste = $id;
				$this->nomArtiste = $nom;
        $this->lienWiki = $lien;
		}    
   */      
    
    function getNom() {
        $db = Database::getInstance();
		$sql = "SELECT nomArtiste FROM artiste WHERE idArtiste = :id";
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute(array(":idArtiste" => $id));
		return $stmt->fetch();
    }
    
    function getWiki() {
        $db = Database::getInstance();
		$sql = "SELECT lienWiki FROM artiste WHERE idArtiste = :id";
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute(array(":idArtiste" => $id));
		return $stmt->fetch();
    }
    
    function setNom($nom, $id) {
			$db = Database::getInstance();
			$sql = "UPDATE artiste SET nomArtiste = :nom WHERE idArtiste = :id";
			$stmt = $db->prepare($sql);
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$stmt->execute(array(
				":nomArtiste" => $nomArtiste,
				":idArtiste" => $id));
    }
    
    function setWiki($wiki, $id) {
			$db = Database::getInstance();
			$sql = "UPDATE artiste SET lienWiki = :wiki WHERE idArtiste = :id";
			$stmt = $db->prepare($sql);
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$stmt->execute(array(
				":lienWiki" => $lien,
				":idArtiste" => $id));
		}
 
	
	public static function ajouterArtiste($nom,$lien)	{
		$db = Database::getInstance();
		$sql = "INSERT INTO artiste (nomArtiste,lienWiki) VALUES (:nomArtiste,:lienWiki)";
		$stmt = $db->prepare($sql);
		//$stmt->setFetchMode(PDO::FETCH_CLASS, "Artiste");
		echo "Artiste bien inséré";
		return $stmt->execute(array(
			":nomArtiste" => $nom,
			":lienWiki" => $lien));
	}

	public static function getId()	{
		$db = Database::getInstance();
		$sql = "SELECT idArtiste FROM artiste WHERE nomArtiste = :nom";
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute(array(":idArtiste" => $id));
		$this->idArtiste = $stmt->fetch(); 
	}
	
		public static function getFromId( $id ) {
		$db = Database::getInstance();
		$sql = "SELECT * FROM artiste WHERE idArtiste = :idArtiste";
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Artiste");
		$stmt->execute(array(":idArtiste" => $id));
		return $stmt->fetch();

}

		public static function getList() {
		$db = Database::getInstance();
		$sql = "SELECT * FROM artiste";
		$stmt = $db->query($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Artiste");
		return $stmt->fetchAll();
	}
}
?>
