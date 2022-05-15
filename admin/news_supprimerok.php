<?php
    if(isSet($_GET["id_news"])) {
    // SUPPRESSION DANS LA BDD
    $bdd = new PDO('mysql:host=localhost;dbname=tv_lca', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $resultat=$bdd->prepare("DELETE FROM news WHERE id_news= ? ");
    $resultat->execute(array($_GET["id_news"]));
    header('Location:news_sender.php');
    }else{
        echo " <h2> Pas supprimer</h2> ";
    }	
?>