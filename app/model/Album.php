<?php 

class Album {
    public $idAlbum;
    public $nomAlbum; //string
    public $dateSortie;//string
    public $note;
		public $dateSortie;
		public $dateSortie;
    
	function __construct($nom,$lien)    {
        $this->nomArtiste = $nom;
        $this->lienWiki = $lien;
        
        $db = Database::getInstance();
		$sql = "INSERT INTO Artiste Art SET Art.nomArtiste = :nom, Art.lienWiki = :wiki";
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute($nom,$wiki);
        
        $sql = "SELECT Art.idArtiste FROM Artiste Art WHERE Art.nomArtiste = :nom";
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute($nom);
		$this->idArtiste = $stmt->fetch(); 
    }
    
    function getNom() {
        $db = Database::getInstance();
		$sql = "SELECT Art.nomArtiste FROM Artiste Art WHERE Art.idArtiste = :id";
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute($id);
		return $stmt->fetch();
    }
    
    function getWiki() {
        $db = Database::getInstance();
		$sql = "SELECT Art.lienWiki FROM Artiste Art WHERE Art.idArtiste = :id";
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute($id);
		return $stmt->fetch();
    }
    
    function setNom($nom, $id) {
        $db = Database::getInstance();
		$sql = "UPDATE Artiste Art SET Art.nomArtiste = :nom WHERE Art.idArtiste = :id";
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute($nom,$id);
    }
    
    function setWiki($wiki, $id) {
        $db = Database::getInstance();
		$sql = "UPDATE Artiste Art SET Art.lienWiki = :wiki WHERE Art.idArtiste = :id";
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute($wiki,$id);
    }
    
}


?>
