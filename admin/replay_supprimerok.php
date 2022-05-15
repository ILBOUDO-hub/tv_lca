<?php
    if(isSet($_GET["id_emission"])) {
    // SUPPRESSION DANS LA BDD
    $bdd = new PDO('mysql:host=localhost;dbname=tv_lca', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $resultat=$bdd->prepare("DELETE FROM emissions WHERE id_emission= ? ");
    $resultat->execute(array($_GET["id_emission"]));
    header('Location:replay_sender.php');
    }else{
        echo " <h2> Pas supprimer</h2> ";
    }	
?>