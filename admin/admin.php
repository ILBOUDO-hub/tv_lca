<?php
include_once("connection.php");
if(isset($_POST['submit'])){
    $lien = htmlspecialchars($_POST['title']) ;
    $titre = htmlspecialchars($_POST['titre']) ;
    $commentaire = htmlspecialchars($_POST['commentaire']) ;
    
    $photo_name = $_FILES['photo']['name'];
    $target= 'upload/media/'.basename($photo_name);
    $info= pathinfo($_FILES['photo']['name']);
    $path = $info['extension'] ;
    if(in_array($path,array("jpg","png","jpeg","JPG","JPEG","PNG","jfif"))){
        if($_FILES['photo']['size']<10000000000){
            move_uploaded_file($_FILES['photo']['tmp_name'], 'upload/media/' . basename($photo_name));
            $bdd= new PDO("mysql:host=localhost;dbname=tv_lca","root","");
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query =$bdd->prepare("INSERT INTO `tv_lca`.`media` (`id_media`, `title`, `photo`, `titre`, `commentaire`) VALUES (NULL, ?, ?,?,?)");
            $query->execute(array($lien,$target,$titre,$commentaire));
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
                        <a class="active-menu"  href="annonces.php"><i class="fa fa-dashboard fa-3x"></i> Login </a>
                    </li>
                    <li>
                        <a href="ui.php"><i class="fa fa-desktop fa-3x"></i> Logout </a>
                    </li>	
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">  

                <div>
                    <form  method="POST" action="annonces.php">
                    <div class="form-group">
                         <input type="text" placeholder="Entrez le nom d'utlisateur" class="form-control" name="nom_gerant" id="">
                     </div>
                    <div class="form-group">
                        <input type="password" placeholder="Entrez le mot de passe" class="form-control" name="mot_de_passe" id="">
                    </div>
                   <input type="submit" name="gerant" value="Se Connecter">
                
                    </form>
                </div>

                       
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
