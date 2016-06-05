<!DOCTYPE html>
<html>

  <head>
    <title>Liste des artistes</title>
  </head>

  <body>
      <form method="post" action="pageArtiste.php">
                    
              <?php
              require_once 'connexion.php';
                  
              $resultats=$connexion->query("SELECT Art.idArtiste, Art.nomArtiste FROM Artiste Art ORDER BY Art.nomArtiste ");

              while( $artiste = $resultats->fetch(PDO::FETCH_ASSOC) ) {
                      echo '<input type="radio" name="artiste" value="'. $artiste['idArtiste'] . '">' .$artiste['nomArtiste'] . "</br>";
              }
              
              $resultats->closeCursor();
              ?>
      <input type="submit" name="Rechercher Albums">
    </form>
  </body>
</html>