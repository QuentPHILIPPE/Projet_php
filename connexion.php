<?php

    $connexion = new PDO(
        "mysql:host=dwarves.iut-fbleau.fr;dbname=philippe;charset=utf8",
        "philippe",
        "quentinphpmyadmin"
    );

    // $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
?>
