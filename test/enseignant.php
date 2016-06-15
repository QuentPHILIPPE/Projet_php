<?php

class Enseignant {
  public $id;
  public $nom;
  public $prenom;
  public $email;
  public $bureau;

  public function __construct($id,$nom, $prenom, $email, $bureau) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->bureau = $bureau;
  }   
  public function __toString(){
    return "id = ". $this->id. " nom = ". $this->nom. " prenom = ". $this->prenom. " email = ". $this->email. " bureau = ". $this->bureau;
  }
    
    
  public function getEmail(){
    return $this->email;
  }  
    
  public function setPrenom($p){
    $this->prenom = $p; 
  }
    
  public function PartageLeBureau($nom, $prenom){
    require_once 'param.inc.php';
    $selectE = "SELECT * FROM enseignant WHERE nom = '$nom' AND prenom = '$prenom'";
    $stmt = $connexion->prepare($selectE);  
    $stmt->execute();
    
    if($infoB = $stmt->fetch()){      
      if($infoB['bureau'] == $this->bureau){
        echo $this->prenom . " " . $this->nom . " et " . $prenom . " " . $nom . " partagent le meme bureau."; 
        return true;
      
      } else {
        echo $this->prenom . " " . $this->nom . " et " . $prenom . " " . $nom . " ne partagent pas le meme bureau."; 
        return false;
      }
    }
  } 
}  
  $monsieur = new Enseignant (5, "Jackson", "Michael", "email@upec.com", 152);
//  echo $monsieur. "<br>";
 // echo $monsieur->getEmail(). "<br>";
  $monsieur->setPrenom("Jacquie");
 // echo $monsieur. "<br>";
  
  $monsieur->PartageLeBureau("Monnerat", "Dennis");

?>