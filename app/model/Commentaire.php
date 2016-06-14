<?php
  class Commentaire extends Model{
    public $idCommentaire, $album, $pseudo, $message;
    
   public static function ajouterCommentaire($pseudo,$album,$message) {
    $db = Database::getInstance();
    $sql = "INSERT INTO commentaire (pseudo,album,message) VALUES (:pseudo,:album,:message)";
    $stmt = $db->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_CLASS, "Commentaire");
    return $stmt->execute(array(
      ':pseudo' => $pseudo,
      ':album' => $album,
      ':message' =>$message
    ));
  }
 }

?>