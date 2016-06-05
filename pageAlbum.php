<?php 

require_once 'connexion.php';

?>

<!DOCTYPE html>
<html>

<head>
  <title>
  <?php
    $titre = $connexion->query("SELECT A.nomAlbum, Art.nomArtiste FROM Album A, Artiste Art WHERE A.idAlbum = 11 AND Art.idArtiste = A.artiste");
    $nom = $titre->fetch(PDO::FETCH_ASSOC);
    echo $nom['nomAlbum'] . " - " . $nom['nomArtiste'];
  ?>
  </title>
</head>

<body>
    
    <a class="embedly-card" href=
    <?php
        $lien = $connexion->query("SELECT A.lienLastFm, Art.nomArtiste FROM Album A, Artiste Art WHERE A.idAlbum = 11 AND Art.idArtiste = A.artiste");
        $link = $lien->fetch(PDO::FETCH_ASSOC);
        echo "'" . $link['lienLastFm'] . "'>" . $link['nomArtiste']."</a>";
    ?>
    <script async src="//cdn.embedly.com/widgets/platform.js" charset="UTF-8"></script>
    
    <form action="envoyerCommentaire.php" method="POST">
        <input type="radio" name="note" value="1"> 1 </br>
        <input type="radio" name="note" value="2"> 2 </br>
        <input type="radio" name="note" value="3"> 3 </br>
        <input type="radio" name="note" value="4"> 4 </br>
        <input type="radio" name="note" value="5"> 5 </br>
        
        <textarea name="message" rows="10" cols="30" placeholder="Que pensez-vous de cet album ?"></textarea>
        <input type="submit" value="Postez !">
</body>
</html>    

    

</html>