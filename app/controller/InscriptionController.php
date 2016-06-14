<?php
class InscriptionController extends Controller {
	
	public function Inscription(){
		$this->view->display(); 
	}
	
	public function envoiInscription() {                                                                                                  
		$db = Database::getInstance();
		extract($_POST);
		
		if(isset($adresseMail) && ($pseudo) && ($mdpU)) {	
			$sql = "INSERT INTO utilisateur (adresseMail,pseudo,mdpU) VALUES (:adresseMail,:pseudo,:mdpU)";
			
			$stmt = $db->prepare($sql);
		//$stmt->setFetchMode(PDO::FETCH_CLASS, "Utilisateur");
			$stmt->bindParam(":adresseMail", $adresseMail);
			$stmt->bindParam(":pseudo", $pseudo);
			$stmt->bindParam(":mdpU", $mdpU);
		return $stmt->execute(array(
			":adresseMail" => $adresseMail,
			":pseudo" => $pseudo,
			":mdpU" => $mdpU));
			
			echo "Utilisateur bien créé";
			
		} else {
			echo "formulaire mal renseigné";
		}
	}
	/*
  public function verifInscription() {
    extract($_POST);
    if(isset($pseudo) && isset($adresseMail) && isset ($mdp) && isset($mdpConfirm)) {
      if($mdp != $mdpConfirm) {
        echo "Les mots de passe ne correspondent pas";
      }
      else {
        $this->view->inscription = Inscription::envoiInscription($adresseMail,$pseudo,$mdp);
				$this->view->display();
      } 
  	}		
	}
*/
	
}
?>
