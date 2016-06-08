<?php 

class Artiste {
    public $idArtiste;
    public $nomArtiste; //string
    public $lienWiki; //string
    
    function __construct($nom,$lien)    {
        $this->idArtiste = $id;
				$this->nomArtiste = $nom;
        $this->lienWiki = $lien;
		}    
         
    
    function getNom() {
        $db = Database::getInstance();
		$sql = "SELECT Art.nomArtiste FROM Artiste Art WHERE Art.idArtiste = :id";
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute([$id]);
		return $stmt->fetch();
    }
    
    function getWiki() {
        $db = Database::getInstance();
		$sql = "SELECT Art.lienWiki FROM Artiste Art WHERE Art.idArtiste = :id";
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute([$id]);
		return $stmt->fetch();
    }
    
    function setNom($nom, $id) {
        $db = Database::getInstance();
		$sql = "UPDATE Artiste Art SET Art.nomArtiste = :nom WHERE Art.idArtiste = :id";
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute([$nom,$id]);
    }
    
    function setWiki($wiki, $id) {
        $db = Database::getInstance();
		$sql = "UPDATE Artiste Art SET Art.lienWiki = :wiki WHERE Art.idArtiste = :id";
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute([$wiki,$id]);
    }
 
	
	public static function ajoutArtiste($nom, $lien)	{
		
		$db = Database::getInstance();
		$sql = "INSERT INTO artiste (nomArt,lien) VALUES (:nomArt,:lien)";
		$stmt = $db->prepare($sql);
		//$stmt->setFetchMode(PDO::FETCH_CLASS, "Artiste");
		echo "Artiste bien inséré";
		return $stmt->execute([$nom,$lien]);
	}

	public static function getId()	{
		    $sql = "SELECT Art.idArtiste FROM Artiste Art WHERE Art.nomArtiste = :nom";
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute([$nom]);
		$this->idArtiste = $stmt->fetch(); 
	}
}


?>
