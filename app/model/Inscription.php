<?php
class Inscription extends Model {
	public $adresseMail, $pseudo, $mdp;
  
	public static function envoiInscription($adresseMail,$pseudo,$mdp) {                                                                                                  
		$db = Database::getInstance();
		
		$selectPseudo = "SELECT * FROM utilisateur WHERE pseudo = :pseudo";
		$selectMail = "SELECT * FROM utilisateur WHERE adresseMail = :adresseMail";
		
    $stmtPseudo = $db->prepare($selectPseudo);
		$stmtMail = $db->prepare($selectMail);
		
		
    $stmtPseudo->bindValue(':pseudo',$pseudo,PDO::PARAM_STR);
		$stmtMail->bindValue(':adresseMail',$adresseMail,PDO::PARAM_STR);
		
    $stmtPseudo->execute();
		$stmtMail->execute();
		
    $resPseudo = $stmt->fetch();
    $resMail = $stmt2->fetch();
		
		if ((!$resPseudo) && (!$resMail)) {
			$insert = "INSERT INTO utilisateur VALUES (:adresseMail,:pseudo,:mdpU)";
			$stmtinsert = $db->prepare($insert);
    	$stmtinsert->setFetchMode(PDO::FETCH_CLASS, "Inscription");
			return $stmtinsert->execute(array(
      'adresseMail'=>$adresseMail,
			'pseudo'=>$pseudo,
      'mdpU'=>$mdpU
       ));
    }
		/*} else {
			if($resPseudo || $resMail) {
				$_SESSION['message'] = "<p> Ce pseudo est déjà pris </p>";
		}
			if ($resultat3 || $resultat4) {
				$_SESSION['message'] = "<p> Cet email est déjà pris </p>";
			}*/
      
		//return $stmt->fetch();
	}
}
?>
