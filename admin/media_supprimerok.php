<?php
    if(isSet($_GET["id_media"])) {
    // SUPPRESSION DANS LA BDD
    $bdd = new PDO('mysql:host=localhost;dbname=tv_lca', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $resultat=$bdd->prepare("DELETE FROM media WHERE id_media= ? ");
    $resultat->execute(array($_GET["id_media"]));
    header('Location:media.php');
    }else{
        echo " <h2> Pas supprimer</h2> ";
    }	
?>