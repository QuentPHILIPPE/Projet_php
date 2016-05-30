<!DOCTYPE html>
<html> 
    <head>
        <title>Inscription</title>
    </head>
    <body>
    <?php

        if(isset($_POST)){
            
            $errors = array();
            // extract($_POST);
          
            if(empty($_POST['pseudo'])){
                $errors['pseudo'] = "Veuillez entrer un pseudo";
            }

            if(empty($_POST['email'])){
                $errors['email'] = "Adresse email non renseignée";
            }

            if(empty($_POST['mdp']) || $_POST['mdp'] != ($_POST['mdpConfirm'])){
                $errors['mdp'] = "Mot de passe invalide";
            }
        }

    ?>
      
        <form action="" method="POST">
            <fieldset>
                <legend>Inscription</legend>

                <label for="">AdresseMail </label>
                    <input type="email" name="email" required/><br><br>

                <label for="">Pseudo </label>
                    <input type="text" name="pseudo" required/><br><br>

                <label for="">Mot de passe </label>
                    <input type="password" name="mdp" required/><br><br>

                <label for="">Confirmer Mot de passe </label>
                    <input type="password" name="mdpConfirm" required/><br><br>

                <button type="submit">S'inscrire</button>
            </fieldset>
        </form>
    
    </body>
</html>