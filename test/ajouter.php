<?php
    require_once 'param.inc.php';
    extract($_POST);
    if(isset($nom) && ($prenom) && ($email) && ($bureau)){
        $insertUser = $connexion->prepare("INSERT INTO enseignant SET nom = ?, prenom = ?, email = ?, bureau = ?");
        $insertUser->execute([$nom, $prenom, $email, $bureau]);
   
        echo "Votre requete a bien ete soumise.";
      
    } else {
      echo "erreur requete non soumise ";
    }
?>
<a href="afficher.php">liste des enseignants</a>