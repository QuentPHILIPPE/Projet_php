<?php
include 'param.inc.php';
?>
 
<!DOCTYPE html>
<html lang="fr">
  <meta charset= "latin1" />
  <head>
    <title>Recherche</title>
  </head>
  <body>
    <h1>
      Recherche par bureau
    </h1>
    <?php if(!isset($_POST['bureau'])) { ?>
    <form method="post" action="recherche.php" >
      <table>
        <tr><td><label>Numero du bureau: </label></td><td><select name="bureau" required>
        <?php
          $req=$connexion->query("SELECT DISTINCT bureau FROM enseignant");
          foreach ($req as $result) { ?>
            <option><?php echo $result['bureau']; ?></option>  
          <?php } ?>
        </select></td></tr>
                <tr><td></td><td><input type="submit" value="Soumettre"/></td></tr>
      </table>
    </form>
    <?php } else {
    $req=$connexion->query("SELECT * FROM enseignant WHERE bureau=".$_POST['bureau']);
    ?>
     <table border = 1>
       
      <th>ID</th><th>Nom</th><th>Prenom</th><th>Email</th><th>Bureau</th>
      <?php foreach($req as $result) { ?>
      <tr>
        <td><?php echo $result['id']; ?></td>
        <td><?php echo $result['nom']; ?></td>
        <td><?php echo $result['prenom']; ?></td>
        <td><?php echo $result['email']; ?></td>
        <td><?php echo $result['bureau']; ?></td>
      </tr>
    <?php } echo "</table>"; } ?>
  </body>
</html>