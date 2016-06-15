<?php
  class Commentaire extends Model{
    public $idCommentaire, $pseudo, $album, $message;
    
   public static function ajouterCommentaire($pseudo,$album,$note,$message) {
     echo "insert";
    $db = Database::getInstance();
    $sql = "INSERT INTO commentaire (pseudo,album,note,message) VALUES (:pseudo,:album,:note,:message)";
    $stmt = $db->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_CLASS, "Commentaire");
    return $stmt->execute(array(
      ':pseudo' => $_SESSION['pseudo'],
      ':album' => $album,
      ':note' => $note,
      ':message' =>$message
    ));
  }
 }

?>