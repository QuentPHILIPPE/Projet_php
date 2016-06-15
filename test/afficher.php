<?php
  include 'param.inc.php';
  $res = $connexion->query("SELECT * FROM enseignant");
  extract($_GET);
  
  if(isset($id)){
    $ens=$connexion->query("SELECT * FROM enseignant WHERE id='$id'");
  }
 
?>
 
<!DOCTYPE html>
<html lang="fr">
  <meta charset= "latin1" />
  <head>
    <title>Enseignants</title>
  </head>
  <body>
    <h1>
      Liste des enseignants
    </h1>
    <table border = 1>
      <?php if(isset($id)){ ?>
  
      <th>ID</th><th>Nom</th><th>Prenom</th><th>Email</th><th>Bureau</th>
      
      <?php foreach($ens as $result) { ?>
  
      <tr><td><?php echo $result['id']; ?></td>
  
        <td><?php echo $result['nom']; ?></td>
  
        <td><?php echo $result['prenom']; ?></td>
  
        <td><?php echo $result['email']; ?></td>
    
        <td><?php echo $result['bureau']; ?></td> </tr>
<?php }
                          }
                       
      else { ?>
       
     
      <th>Prenom</th><th>Nom</th>
     
      <tr> <?php foreach($res as $result) { ?>
        <td><a href="afficher.php?id=<?php echo $result['id']; ?>"><?php echo $result['prenom']; ?></a></td>
        <td><?php echo $result['nom']; ?></td>
      </tr>
      <?php } }
      ?>
    </table>
  </body>
</html>