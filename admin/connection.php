<?php
        // connexion à la base de donnée
        try{
                $connexion= new PDO("mysql:host=localhost;dbname=tvlca","root","");
                $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               
             }
        catch(PDOException $e){
            return "error:" .$e->getMessage();
            die();
        }
?>
