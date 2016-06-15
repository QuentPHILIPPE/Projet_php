<?php
class Connexion extends Model {
	public $pseudo, $mdp ;
  
	public static function validConnexion($pseudo,$mdp) {
    
		$db = Database::getInstance();
		$sql = "SELECT * FROM utilisateur WHERE pseudo = :pseudo";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':pseudo',$pseudo,PDO::PARAM_STR);
    $stmt->execute();
    $res = $stmt->fetch();
    
    if ($res['mdpU'] == $mdp ) {
			session_start();
      $_SESSION['pseudo'] = $res['pseudo'];
    }
    
    if ($res['mdpU'] != $mdp ) {
      // echo "<h2>Votre mot de passe est incorrecte veuillez réessayer</h2>";
    }
	}
}
?>