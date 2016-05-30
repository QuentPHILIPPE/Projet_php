<?php 

class Commentaire {
    public $idCommentaire, //int
    public $utilisateur //User
    public $album //Album
    public $message //string
    public $note //int
    
    function __construct($id,$user,$message,$album,$note)    {
        $this->idCommentaire = $id;
        $this->utilisateur = $user;
        $this->album = $album;
        $this->message = $message;
        $this->note = $note;
    }
    
    function getUser() {
        return $this->utilisateur;
    }
    
    function getAlbum() {
        return $this->album;
    }
  
    function getMessage() {
        return $this->message;
    }
    
    function getNote() {
        return $this->note;
    }
       
    function setMessage($message) {
        $this->message=$message;
    }
    
    function setNote($note) {
        $this->note=$note;
    }
    
}


?>