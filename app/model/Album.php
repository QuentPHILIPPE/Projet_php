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
		$sql = "SELECT DISTINCT nomArtiste, idArtiste FROM artiste";
		$stmt = $db->query($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Artiste");
		//$stmt->execute(); 
		return $stmt->fetchAll();
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
	$sql = "SELECT idAlbum, nomAlbum, dateSortie, note, artiste, lienLastFm, nomArtiste FROM album, artiste WHERE artiste = idArtiste";
	$stmt = $db->query($sql);
	$stmt->setFetchMode(PDO::FETCH_CLASS, "Album");
	return $stmt->fetchAll();
		
	}

	public static function ajouterAlbum($nomAlbum,$dateSortie,$lienLastFm,$artiste) {
		extract($_POST);
		$db = Database::getInstance();
		$sql = "INSERT INTO album (nomAlbum,dateSortie,lienLastFm,artiste) VALUES (:nomAlbum,:dateSortie,:lienLastFm,:artiste)";
		$stmt = $db->prepare($sql);
		echo "MMMMM";
		$stmt->bindParam(':nomAlbum', $nomAlbum);
		$stmt->bindParam(':dateSortie', $dateSortie);
		$stmt->bindParam(':lienLastFm', $lienLastFm);
		$stmt->bindParam(':artiste', $artiste);
		//$stmt->setFetchMode(PDO::FETCH_CLASS, "Artiste");
		echo "Album bien ajouté !";
		return $stmt->execute(array(
			":nomAlbum" => $nomAlbum,
			":dateSortie" => $dateSortie,
			":lienLastFm" => $lienLastFm,
			":artiste" => $artiste));
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
