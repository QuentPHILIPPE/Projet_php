<!DOCTYPE html>
<html>

<head>
  <title>Ajout d'un Artiste</title>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="style.css">

</head>

<body>
    <h1>Ajout Artiste</h1>
    <form action="" method="POST">
    <?php

        if(isset($_POST)){
            
            $errors = array();
            require_once 'connexion.php';
          
            if(empty($_POST['nom'])){
                $errors['nom'] = "Veuillez entrer un nom";
            } else {
                $requete = $connexion->prepare("SELECT nomArtiste FROM Artiste WHERE nomArtiste = ?");
                $requete->execute([$_POST['nom']]);
                $artiste = $requete->fetch();
              
                if($artiste){
                  $errors['nom'] = "Cet artiste est déjà dans la base !";
                }
              }
          
            if(empty($errors)){
              
              $insertArtiste = $connexion->prepare("INSERT INTO artiste SET nomArtiste = ?, dateNaissance = ?, biographie = ?, lienWiki = ?, groupe = ?");
              $insertArtiste->execute([$_POST['nom'], $_POST['date'], $_POST['biographie'],$_POST['lien'], $_POST['groupe']]);
            }    
        }

    ?>
        <fieldset>
        <label for="">Nom de l'artiste </label>
        <input type="text" name="nom" placeholder="Nom"/><br><br>

        <label for="">Date de naissance </label>
        <input type="date" name="date"/><br><br>

        <label for="">Lien Wikipédia</label>
        <input type="text" name="lien" placeholder="Lien Wikipedia"/><br><br>
        
        <label for="">Biographie</label>
        <input type="text" name="biographie" placeholder="Bio"/><br><br>
        
        <label for="">Groupe</label>
        <input type="number" name="groupe" placeholder="Groupe"/><br><br>
        
        <button type="submit" id="submit">Soumettre</button>
        </fieldset>
    </form>
    
    
    
    
</body>
</html>

