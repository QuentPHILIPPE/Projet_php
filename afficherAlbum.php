<!DOCTYPE html>
<html>

<head>
  <title>Films</title>
</head>

<body>
  <table>
    <thead>
      <tr>
        <th>Album</th>
        <th>Date</th>
        <th>Note</th>
        <th>Lien</th>
      </tr>
    </thead>
  <?php
        require_once 'connexion.php';
 
        $resultats=$connexion->query("SELECT A.nomAlbum,A.dateSortie,A.note, A.lienYoutube FROM Album A ");

        while( $album = $resultats->fetch(PDO::FETCH_ASSOC) ) {
 

                echo "<tr>";
                echo "<td>" . $album['nomAlbum'] . "</td>" . "<td>" . $album['dateSortie'] . "</td>" . "<td>" . $album['note'] . "</td>" . "<td>" . $album['lienYoutube'] . "</td>";
                echo "</tr>";
        }
        
        $resultats->closeCursor();
?>
  </table>
</body>
</html>