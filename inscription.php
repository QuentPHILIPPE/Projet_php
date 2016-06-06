<!DOCTYPE html>
<html>

<head>
  <title>Inscription</title>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="style.css">

</head>


  
<body>

  <header>
    <a href="conn.php">Connexion</a>
  
  </header>
  
  <?php

        if(isset($_POST)){
            
            $errors = array();
            require_once 'connexion.php';
         
          
           if(empty($_POST['pseudo'])){
                $errors['pseudo'] = "Veuillez entrer votre pseudo";
            } 

          
            if(empty($_POST['email'])){
                $errors['email'] = "Veuillez entrer une adresse mail valide";
            } else {
                $requete = $connexion->prepare("SELECT adresseMail FROM Utilisateur WHERE adresseMail = ?");
                $requete->execute([$_POST['email']]);
                $user = $requete->fetch();
              
                if($user){
                  $errors['email'] = "Cet email existe déjà pour un autre compte";
                }
            }
 
          
          if(empty($_POST['mdp']) || $_POST['mdp'] != ($_POST['mdpConfirm'])){
                 $errors['mdp'] = "Mot de passe invalide ou non renseigné";
             } 
          
          
          if(empty($errors)){
              
              $insertUser = $connexion->prepare("INSERT INTO utilisateur SET adresseMail = ?, pseudo = ?, mdpU = ?");
              $password = sha1($_POST['mdp']);
              $insertUser->execute([$_POST['email'], $_POST['pseudo'], $password]);
              
            } 
        } 
        
    ?>
  
    <form action="" method="POST">
      <fieldset>
        <legend>Inscription</legend>

 
      <?php if(!empty($errors)): ?>
          <div id="errordiv">
            <ul>

                <?php foreach($errors as $error): ?>
                <li> <?= $error ?> </li>
                <?php endforeach; ?>

            </ul>
          </div><br>
       <?php endif; ?>
          
        <label for="">Pseudo</label>
        <input type="text" name="pseudo" placeholder="Pseudo" value="<?php if(isset($_POST['pseudo'])){ echo $_POST['pseudo']; } ?>" required /><br><br>
        
        <label for="">AdresseMail </label>
        <input type="email" name="email" placeholder="adresse@mail.com" value="<?php if(isset($_POST['email'])){ echo $_POST['email']; } ?>" required /><br><br>

        <label for="">Mot de passe </label>
        <input type="password" name="mdp" placeholder="password"/><br><br>

        <label for="">Confirmer Mot de passe </label>
        <input type="password" name="mdpConfirm" placeholder="password"/><br><br>

        <button type="submit" id="submit">S'inscrire</button>
      </fieldset>
    </form>

</body>

</html>
