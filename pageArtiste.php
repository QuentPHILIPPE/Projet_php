<?php 

require_once 'connexion.php';

?>

<!DOCTYPE html>
<html>

<head>
  <title>
  <?php
    $titre = $connexion->query("SELECT Art.nomArtiste FROM Artiste Art WHERE Art.idArtiste = 2");
    $nom = $titre->fetch(PDO::FETCH_ASSOC);
    echo $nom['nomArtiste'];
  ?>
  </title>
</head>

<body>
    
    <a class="embedly-card" href=
    <?php
        $lien = $connexion->query("SELECT Art.lienWiki, Art.nomArtiste FROM Artiste Art WHERE Art.idArtiste = 2");
        $link = $lien->fetch(PDO::FETCH_ASSOC);
        echo "'" . $link['lienWiki'] . "'>" . $link['nomArtiste']."</a>";
    ?>
    <script async src="//cdn.embedly.com/widgets/platform.js" charset="UTF-8"></script>
    
    <table>
    <thead>
      <tr>
        <th>Album</th>
        <th>Date</th>
        <th>Note</th>
      </tr>
    </thead>
    <?php
    
        $resultats=$connexion->query("SELECT A.nomAlbum,A.dateSortie,A.note FROM Album A WHERE artiste = 2");

        while( $album = $resultats->fetch(PDO::FETCH_ASSOC) ) {
 

                echo "<tr>";
                echo "<td>" . $album['nomAlbum'] . "</td>" . "<td>" . $album['dateSortie'] . "</td>" . "<td>" . $album['note'] . "</td>";
                echo "</tr>";
        }
        
        $resultats->closeCursor();
    ?>
  </table>
</body>
</html>    
    

</html>