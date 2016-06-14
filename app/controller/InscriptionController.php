<?php
class InscriptionController extends Controller {
	
	public function Inscription(){
		$this->view->display(); 
	}
	
	public function envoiInscription() {                                                                                                  
		$db = Database::getInstance();
		extract($_POST);
		
		if(isset($adresseMail) && ($pseudo) && ($mdpU)) {
			if($mdpU == $mdpConfirm){
				$sql = "INSERT INTO utilisateur (adresseMail,pseudo,mdpU) VALUES (:adresseMail,:pseudo,:mdpU)";
				$mdpU = sha1($mdpU);
				$stmt = $db->prepare($sql);
				//$stmt->setFetchMode(PDO::FETCH_CLASS, "Utilisateur");
				$stmt->bindParam(":adresseMail", $adresseMail);
				$stmt->bindParam(":pseudo", $pseudo);
				$stmt->bindParam(":mdpU", $mdpU);
				
				echo "Utilisateur bien créé";
				
				return $stmt->execute(array(
				":adresseMail" => $adresseMail,
				":pseudo" => $pseudo,
				":mdpU" => $mdpU));
			
				
			
			} else {
				echo "mots de passe différents";
			}
		
		} else {
			echo "formulaire mal renseigné";
		}
	}
	
	
}
?>