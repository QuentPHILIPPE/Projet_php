<?php
  class Commentaire extends Model{
    public $idCommentaire, $pseudo, $album, $message;
    
   public static function ajouterCommentaire($pseudo,$album,$message) {
    $db = Database::getInstance();
    $sql = "INSERT INTO commentaire (pseudo,album,message) VALUES (:pesudo,:album,:message)";
    $stmt = $db->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_CLASS, "Commentaire");
    return $stmt->execute(array(
      ':pseudo' => $_SESSION['pseudo'],
      ':album' => $album,
      ':message' =>$message
    ));
  }
 }

?>