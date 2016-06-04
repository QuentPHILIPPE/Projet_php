<?php 

class Utilisateur {
    public $adresseMail, //string
    public $pseudo //string
    public $mdpU //string
        
    function __construct($adr,$pseudo,$mdp)    {
        $this->adresseMail = $adr;
        $this->pseudo = $pseudo;
        $this->mdpU = $mdp;
    }
    
    function getAdresse() {
        return $this->adresseMail;
    }
    
    function getPseudo() {
        return $this->pseudo;
    }
  
    function getMdp() {
        return $this->mdpU;
    }
  
    function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
    }
  
    function setMdp($mdp) {
        $this->mdpU = $mdp;
    }
    
    function ecrireCommentaire($message,$note,$album) {
        $com = new Commentaire($this,$message,$album,$note);
    }
    
    function modifierCommentaire($commentaire, $message, $note) {
        if(isset($message)) {
            $commentaire->setMessage($message);
        }
        
        if(isset($note)) {
            $commentaire->setNote($note);
        }
    }
    
}


?>