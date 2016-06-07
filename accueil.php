<?php
session_start();
require_once 'connexion.php';

if(isset($_GET['pseudo'])){
    $requete = $connexion->prepare("select * From utilisateur where pseudo = ?");
    $requete->execute([$_GET['pseudo']]);
    $userinfo = $requete->fetch();
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>Connexion</title>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="style.css">

</head>
  
<body>
       
      <fieldset>
        <legend>Profil de <?php echo $userinfo['pseudo'];?></legend>

         <h3> <a href="afficherAlbum.php">Afficher les albums</a> </h3>
         <h3> <a href="afficherArtiste.php">Afficher les artistes </a> </h3>
      <?php
        if($userinfo['pseudo'] == $_SESSION['pseudo']){
          
      ?>
         <h3> <a href="deconnexion.php">Déconnexion</a> </h3>
        
      <?php  } ?>    
          
      </fieldset>
    </form>

</body>

</html>
