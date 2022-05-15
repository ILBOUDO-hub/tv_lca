<?php
    if(isSet($_GET["id_annonces"])) {
    // SUPPRESSION DANS LA BDD
    $bdd = new PDO('mysql:host=localhost;dbname=tv_lca', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $resultat=$bdd->prepare("DELETE FROM annonces WHERE id_annonces= ? ");
    $resultat->execute(array($_GET["id_annonces"]));
    header('Location:annonces.php?Succès');
    }else{
        echo " <h2> Pas supprimer</h2> ";
    }	
?>