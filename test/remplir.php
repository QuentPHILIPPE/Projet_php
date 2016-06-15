<?php //Mode brut
    $stmt = $pdo->prepare("INSERT INTO enseignant (nom, prenom, email, bureau) VALUES (:nom, :prenom, :email, :bureau)");
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':bureau', $bureau);
    
    $nom = 'Hate';
    $prenom = 'Sandra';
    $email = 'sandrahate@u-pec.fr';
    $bureau = 1;
    $stmt->execute();
   ?>