<!DOCTYPE html>
<html>

<head>
  <title> Commentaire envoyé ! </title>
</head>

<body>
  
<?php

    require_once("connexion.php");
    $insertCommentaire = $connexion->prepare("INSERT INTO commentaire SET pseudo = 'user', album = 11, note = ?, message = ?");
    $insertCommentaire->execute([$_POST['note'], $_POST['message']]);
    
    echo "Votre commentaire a bien été posté !"
            
?>

    <form action="pageAlbum.php">
        <input type="submit" value="Retour à la page de l'album">
    </form>
    
</body>
</html>
        
