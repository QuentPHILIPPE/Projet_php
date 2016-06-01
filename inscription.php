<!DOCTYPE html>
<html>

<head>
  <title>Inscription</title>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="style.css">

</head>

<body>
  
  
  <?php

        if(isset($_POST)){
            
            $errors = array();
            require_once 'connexion.php';
          
            if(empty($_POST['pseudo'])){
                $errors['pseudo'] = "Veuillez entrer un pseudo";
            } else {
                $requete = $connexion->prepare("SELECT pseudo FROM User WHERE pseudo = ?");
                $requete->execute([$_POST['pseudo']]);
                $user = $requete->fetch();
              
                if($user){
                  $errors['pseudo'] = "Ce pseudo est déja utilisé";
                }
              }

            if(empty($_POST['email'])){
                $errors['email'] = "Veuillez entrer une adresse mail valide";
            } else {
                $requete = $connexion->prepare("SELECT pseudo FROM User WHERE adresseMail = ?");
                $requete->execute([$_POST['email']]);
                $user = $requete->fetch();
              
                if($user){
                  $errors['email'] = "Cet email existe déjà pour un autre compte";
                }
            }
          
            if(empty($_POST['mdp'] || ($_POST['mdp'] != $_POST['mdpConfirm']))) {
                $errors['mdp'] = "Mot de passe non renseignés ou invalide";
              
            } 
          
            if(empty($errors)){
              
              $insertUser = $connexion->prepare("INSERT INTO User SET adresseMail = ?, pseudo = ?, mdpUser = ?");
              $password = password_hash($_POST['mdp'], PASSWORD_BCRYPT);
              $insertUser->execute([$_POST['email'], $_POST['pseudo'], $password]);
            }    
        }

    ?>
  
    <form action="" method="POST">
      <fieldset>
        <legend>Inscription</legend>

      
    <?php if(!empty($errors)): ?>
        <div>

          <ul>

            <?php foreach($errors as $error): ?>
            <li>
              <?= $error ?>
            </li>
            <?php endforeach; ?>

          </ul>
        </div><br>
     <?php endif; ?>
        
        
        <label for="">Pseudo </label>
        <input type="text" name="pseudo" placeholder="pseudo"/><br><br>

        <label for="">AdresseMail </label>
        <input type="email" name="email" placeholder="adresse@mail.com" required /><br><br>

        <label for="">Mot de passe </label>
        <input type="password" name="mdp" placeholder="password"/><br><br>

        <label for="">Confirmer Mot de passe </label>
        <input type="password" name="mdpConfirm" placeholder="password"/><br><br>

        <button type="submit" id="submit">S'inscrire</button>
      </fieldset>
    </form>

</body>

</html>
