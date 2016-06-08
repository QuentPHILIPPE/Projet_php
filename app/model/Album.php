<?php 

class Album {
    public $idAlbum; // int
    public $nomAlbum; //string
		public $dateSortie;// date
		public $note; // int
		public $artiste;
		public $lienLastFm;
    
	function __construct($nom,$note)	{
        $this->id = $id;
				$this->nomAlbum = $nom;
				$this->dateSortie = $date;
        $this->note = $note;
				$this->artiste = $artiste;
        $this->lienLastFm = $lien;
		
        $db = Database::getInstance();
		$sql = "INSERT INTO Album SET nomAlbum = :nom, note = :note";
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute($nom,$note);
        
        $sql = "SELECT idAlbum FROM Album WHERE nomAlbum = :nom";
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute($nom);
		$this->idAlbum = $stmt->fetch(); 
    }
    
    function getNom() {
        $db = Database::getInstance();
		$sql = "SELECT nomAlbum FROM Album WHERE idAlbum = :id";
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute($id);
		return $stmt->fetch();
    }
    
    function getDate() {
        $db = Database::getInstance();
		$sql = "SELECT dateSortie FROM Album WHERE idAlbum = :id";
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute($id);
		return $stmt->fetch();
    }
  
	
		function getNote() {
        $db = Database::getInstance();
		$sql = "SELECT note FROM Album WHERE idAlbum = :id";
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute($id);
		return $stmt->fetch();
    }
    
	
    function setNom($nom, $id) {
        $db = Database::getInstance();
		$sql = "UPDATE Album SET nomAlbum = :nom WHERE idAlbum = :id";
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute($nom,$id);
    }
    
    function setDate($date, $id) {
        $db = Database::getInstance();
		$sql = "UPDATE Album SET dateSortie = :date WHERE idAlbum = :id";
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute($date,$id);
    }
    
		function setNote($note, $id) {
        $db = Database::getInstance();
		$sql = "UPDATE Album SET note = :note WHERE idAlbum = :id";
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute($note,$id);
    }
    
	public static function getList() {
	$db = Database::getInstance();
	$sql = "SELECT * FROM album";
	$stmt = $db->query($sql);
	$stmt->setFetchMode(PDO::FETCH_CLASS, "Album");
	return $stmt->fetchAll();
		
	}

	public static function ajoutAlbum($nom,$date,$note,$artiste,$lien) {
		$db = Database::getInstance();
		$sql = "INSERT INTO album (nomAlbum,dateSortie,note,artiste,lien) VALUES (:nomAlbum,:dateSortie,:note,:artiste,:lien)";
		$stmt = $db->prepare($sql);
		//$stmt->setFetchMode(PDO::FETCH_CLASS, "Artiste");
		echo "Album bien ajouté !";
		return $stmt->execute([$nom,$date,$note,$artiste,$lien]);
 	}
}


?>
