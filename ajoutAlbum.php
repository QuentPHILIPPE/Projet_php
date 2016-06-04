<!DOCTYPE html>
<html>

<head>
  <title>Ajout d'un Album</title>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="style.css">

</head>

<body>
    <h1>Ajout Album</h1>
    <form action="" method="POST">
        <?php

        if(isset($_POST)){
            
            $errors = array();
            require_once 'connexion.php';
          
            if(empty($_POST['nom'])){
                $errors['nom'] = "Veuillez entrer un nom";
            } else {
                $requete = $connexion->prepare("SELECT nomAlbum FROM Album WHERE nomAlbum = ?");
                $requete->execute([$_POST['nom']]);
                $album = $requete->fetch();
              
                if($album){
                  $errors['nom'] = "Cet album est déjà dans la base !";
                }
              }
          
            if(empty($errors)){
              
              $insertAlbum = $connexion->prepare("INSERT INTO album SET nomAlbum = ?, dateSortie = ?, lienYoutube = ?");
              $insertAlbum->execute([$_POST['nom'], $_POST['date'], $_POST['lien']]);
            }    
        }

    ?>
        <fieldset>
        <label for="">Nom de l'album </label>
        <input type="text" name="nom" placeholder="nom"/><br><br>

        <label for="">Date de sortie </label>
        <input type="date" name="date"/><br><br>

        <label for="">Lien Youtube </label>
        <input type="text" name="lien" placeholder="Lien Youtube"/><br><br>

        <button type="submit" id="submit">Soumettre</button>
        </fieldset>
    </form>
    
    
</body>

