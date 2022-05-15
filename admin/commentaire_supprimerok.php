<?php
    if(isSet($_GET["id_commentaire"])) {
    // SUPPRESSION DANS LA BDD
    $bdd = new PDO('mysql:host=localhost;dbname=tv_lca', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $resultat=$bdd->prepare("DELETE * FROM commentaire WHERE id_commentaire='" . $_GET["id_commentaire"] . "' ");
    }else{
        echo " <h2> Pas supprimer</h2> ";
    }	
?>