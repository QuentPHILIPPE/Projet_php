<?php
session_start();
  if(isset($_POST) && !empty($_POST['pseudo']) && !empty($_POST['mdp'])){
    require_once 'connexion.php';
    
    $password = sha1($_POST['mdp']);
    
    $requete = $connexion->prepare("select * From utilisateur where pseudo = ? AND mdpU = ?");
    $requete->execute([$_POST['pseudo'], $password]);
    $userexist = $requete->rowCount();
    
    if($userexist == 1){
        $userinfo = $requete->fetch();
        $_SESSION['pseudo'] = $userinfo['pseudo'];
        $_SESSION['email'] = $userinfo['email'];
        header("location: accueil.php?pseudo=".$_SESSION['pseudo']);
    } else {
      
        echo "mauvais identifiant ou mauvais mot de passe";
    }
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
    
    <form action="" method="POST">
      <fieldset>
        <legend>Connexion</legend>

          
        <label for="">Pseudo</label>
        <input type="text" name="pseudo" placeholder="Pseudo" value="<?php if(isset($_POST['pseudo'])){ echo $_POST['pseudo']; } ?>" required /><br><br>

        <label for="">Mot de passe </label>
        <input type="password" name="mdp" placeholder="password"/><br><br>
        
        <button type="submit" id="submit">Connexion</button>
      </fieldset>
    </form>

</body>

</html>
