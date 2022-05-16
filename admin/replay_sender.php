<?php
include_once("connection.php");
if(isset($_POST['submit'])){
    $lien = htmlspecialchars($_POST['lien']) ;
    $titre = htmlspecialchars($_POST['titre']) ;
    $type_emissions = htmlspecialchars($_POST['type_emissions']) ;
    $commentaire = htmlspecialchars($_POST['commentaire']) ;
    
    $photo_name = $_FILES['photo']['name'];
    $target= 'upload/emission/'.basename($photo_name);
    $info= pathinfo($_FILES['photo']['name']);
    $path = $info['extension'] ;
    if(in_array($path,array("jpg","png","jpeg","JPG","JPEG","PNG","jfif"))){
        if($_FILES['photo']['size']<10000000000){
            move_uploaded_file($_FILES['photo']['tmp_name'], 'upload/emission/' . basename($photo_name));
            $bdd= new PDO("mysql:host=localhost;dbname=tv_lca","root","");
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query =$bdd->prepare("INSERT INTO `tv_lca`.`emissions` (`id_emission`, `lien`, `titre`,`type_emissions`,`photo`, `commentaire`) VALUES (NULL, ?, ?,?,?,?)");
            $query->execute(array($lien,$titre,$type_emissions,$target,$commentaire));
        }else{
            echo"<h1>too big</h1>";
        }
    }else{
        echo"<h1>format no valid</h1>";
    } 
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LCA Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />


<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 85%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}
</style>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">LCA admin</a> 
            </div>
            <div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;"> 
    Last access : <?php echo " Aujourd'hui le ". date('d / M / Y H:m:s ').""; ?> &nbsp; 
    <a href="users.php" class="btn btn-danger square-btn-adjust">Logout</a></div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				        <li class="text-center">
                    <img src="assets/img/logo.png" class="user-image img-responsive"/>
					      </li>
                     <li>
                        <a href="annonces.php"><i class="fa fa-desktop fa-3x"></i> Annonces</a>
                    </li>
                    <li>
                        <a href="media.php"><i class="fa fa-qrcode fa-3x"></i> Medias</a>
                    </li>
                    <li>
                        <a class="active-menu" href="replay_sender.php"><i class="fa fa-check-circle fa-3x"></i> Emissions</a>
                    </li>
					          <li>
                        <a   href="news_sender.php"><i class="fa fa-bar-chart-o fa-3x"></i> News</a>
                    </li>	
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">

    <div class="container">
        <h2 style="text-align: center;">Poster une émission</h2>
        <div class="row">
          <section class="col-xs-10">
      
      <form class="form-horizontal" method="POST" enctype="multipart/form-data" method="replay_sender.php">
      <div class="form-group">
        <label class="col-sm-2 control-label"
          for="auteur">Lien</label>
        <div class="col-sm-10">
        <input class="form-control" type="text"
          name="lien" placeholder="Expéditeur" required>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label"
          for="titre">Titre</label>
        <div class="col-sm-10">
        <input class="form-control" type="text"
          name="titre" placeholder="Titre de la publication" required>      
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label"
          for="types_news">Type d'émission</label>
        <div class="col-sm-10">
        <select class="form-control" name="type_emissions" id="types_news" required>
          <option>Divertissement</option>
          <option>Debats</option>
          <option>Societe</option>
        </select>
        </div>
      </div>

     
      <div class="form-group">
        <label class="col-sm-2 control-label"
          for="photo_name">Photo</label>
        <div class="col-sm-10">
        <input class="form-control" type="file"
          name="photo" placeholder="Photo" required>      
        </div>
      </div>

      
      <div class="form-group">
        <label class="col-sm-2 control-label"
          for="commentaire">Commentaire</label>
        <div class="col-sm-10">
        <textarea class="form-control" 
          name="commentaire" required></textarea>
        </div>
      </div>
      
      <div class="form-group">
      <div class="col-sm-10 col-sm-offset-2">
        <input type="submit" class="btn btn-default" name="submit" value="submit">
      </div>
      </div>
      
      </form>
      
          </section>
        </div><!-- row -->   


<?php
    //récupération de tous les enregistrements de la table utilisateurs	
    $bdd= new PDO("mysql:host=localhost;dbname=tv_lca","root","");
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $resultat = $bdd->query("SELECT * FROM `emissions`  ORDER BY `id_emission` desc");
	if($resultat){
		echo "<h1 style=\"text-align:center;color: red\";>Liste des émissions</h1>\n";
		//nb de lignes contenu dans résultat
		
		// récupération de chaque ligne et affichage dans un tableau HTML
		echo "<table border='1'>\n";
		echo "<tr>\n";
		echo "<td><strong>Images</strong></td>\n";
		echo "<td><strong>Titre</strong></td>\n";
        echo "<td><strong>Type_emission</strong></td>\n";
		echo "<td><strong>Commentaire</strong></td>\n";
		echo "<td><strong>Action</strong></td>\n";
		echo "</tr>\n";
  		while($utilisateur=$resultat->fetch()){
            $photo = $utilisateur["photo"];
			echo "<tr>\n";
			echo "<td> <img class=\"img-responsive\" src=\"$photo\" style=\"height: 100px;width: 200px;margin-top: 10px\" alt=\"Grooming Photo\"> </td>\n";
			echo "<td>" . $utilisateur["titre"] . "</td>\n";
            echo "<td>" . $utilisateur["type_emissions"] . "</td>\n";
			echo "<td>" . $utilisateur["commentaire"] . "</td>\n";
			echo "<td><a href='replay_supprimerok.php?id_emission=" . $utilisateur["id_emission"] ."' class=\"btn btn-danger navbar-btn\" role=\"button\" onclick=\"return confirm('Etes vous sûre de vouloir supprimer ?')\">Supprimer</a></td>\n";
			echo "</tr>\n";
		}
		echo "</table>\n";
	}else{
		echo "erreure dans l'éxécution de la requête</br>";
	}
?>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
