<?php 

class Album {
    public $idAlbum; // int
    public $nomAlbum; //string
		public $dateSortie;// date
		public $note; // int
		public $artiste;
		public $lienLastFm;

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
	
	function getArtiste()	{
		$db = Database::getInstance();
		$sql = "SELECT DISTINCT nomArtiste FROM artiste";
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute(); 
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
	
	public static function getFromId($id) {
		$db = Database::getInstance();
		$sql = "SELECT * FROM album WHERE idAlbum =:idAlbum";
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "album");
		$stmt->execute(array(":idAlbum" => $id));
		return $stmt->fetch();
	}
}

?>
