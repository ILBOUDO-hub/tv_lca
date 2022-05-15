<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="news.css">

  <title>Lca-Tv</title>
</head>

<body>
  <!-- Header + Navbar -->
  <section class="header">
        <!-- Nav Bar -->
        <nav class="navbar navbar-expand-lg navbar-light black">
        <div class="container">
            <a class="navbar-brand" href="#"><img class="logo" src="images/logo.png" alt="logo-lca"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span><img src="images/icons/menu.png" class="menu-toggler"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Programmes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="replay.php">Replay</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="politique.php">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Qui sommes nous?</a>
                    </li>
                </ul>
                <div class="live">
                    <div class="live-button">
                        <a href="">Live</a>
                    </div>
                    <div class="social-media">
                        <div class="social-items">
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        </div>
                        <div class="social-items">
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        </div>
                        <div class="social-items">
                            <a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                        </div>
                        <div class="social-items">
                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </div>
                        <div class="social-items">
                            <a href="#"> <img class="tiktok" src="images/icons/tiktok.png" alt=""> </a>
                        </div>
                    </div>
                    <div class="canal-tnt">
                        <p>tnt: 16 - canal+: 256</p>
                    </div>
                </div>
            </div>
        </div>
    </nav>


  <div class="navbar" style="background-color: blue;">
    <a href="politique.php"> Politique</a> 
    <a href="economie.php"> Economie</a> 
    <a href="culture.php"> Culture</a> 
    <a href="sante.php"> Santé</a>
    <a href="technologie.php"> Technologie</a>
  </div>

	<!-- Event list section -->
	<section class="event-list-section spad">
		<div class="container">
			<div class="event-list">
				<!-- event list item -->

<?php
if(isset($_GET["id_news"])){ 
// Connexion à la base de données 
    try {    
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;    
        $bdd = new PDO('mysql:host=localhost;dbname=tv_lca', 'root', '', $pdo_options);        
        // Récupération du billet    
        $req = $bdd->query("SELECT * FROM news WHERE id_news='" . $_GET["id_news"] . "'");
        $donnees = $req->fetch();    
?>        

        <div class="el-item">
					<div class="row">
						<div class="col-xs-12 col-sm-10 col-md-12"></br>
              <img src="<?php echo htmlspecialchars($donnees['photo']); ?>" alt="Snow" style="width:100%;max-width:100%;height: 280px;">
						</div>
						<div class="col-xs-12 col-sm-10 col-md-12">
							<div class="el-content">
								<div class="el-header">
									
									<div class="el-metas"></br>
										<div class="el-meta"><i class="fa fa-user"></i> <?php echo $donnees['auteur']; ?> | <i class="fa fa-calendar"></i> <?php echo $donnees['dates_news']; ?> </div>
									</div>
								</div>
								<p style="text-align: justify;"> </br> <?php echo nl2br(htmlspecialchars($donnees['contenu'])); ?> </p>
							</div>
						</div>
					</div>
				</div>   
    </section>

    <div class="container"> 
      <h2>Laisser votre commentaire</h2>
    </div>

    <section id="contact" class="contact">
    <div class="contact-box">
      <form class="row g-3" method="post" action="single_news.php?id_news=<?php echo $donnees['id_news']; ?>" enctype="multipart/form-data">
        <div class="col-md-6 col-sm-12 mt-2">
          <input type="text" class="form-control" name="nom" id="name" placeholder="Votre nom">
        </div>
        <div class="col-md-6 col-sm-12 mt-2">
          <input type="text" class="form-control" name="prenom" id="surname" placeholder="Votre prénom">
        </div>
        <div class="col-12 mt-2">
          <input type="email" class="form-control" name="email" id="mail_address" placeholder="Votre adresse mail">
        </div>
        <div class="col-12 mt-2">
          <textarea class="form-control" name="message" id="message" placeholder="Votre message ici"></textarea>
        </div>
        <div class="col-12 mt-2">
          <button type="submit" id="btn_envoyer_message" class="btn btn-primary form-control">ENVOYER</button>
        </div>
      </form>
    </div>
  </section>
    <?php
        if (isset($_GET['id_news'],$_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['message'])){ 
        $bdd = new PDO('mysql:host=localhost;dbname=tv_lca', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $requete=$bdd->prepare('INSERT INTO  commentaire ( id_commentaire,id_news,nom,prenom,email,commentaire,date_commentaire) VALUES(Null,?, ?, ?, ?,?,CURDATE())');
        $requete->execute(array($_GET['id_news'],$_POST['nom'],$_POST['prenom'],$_POST['email'], $_POST['message']));
        }
    ?>
   
  <div class="container"> 
    <h3>Commentaires</h3>        
    <?php   
        $req->closeCursor(); // Important : on libère le curseur pour la prochaine requête        
        // Récupération des commentaires  
        $bdd = new PDO('mysql:host=localhost;dbname=tv_lca', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));  
        $req = $bdd->query("SELECT id_commentaire, nom, prenom, commentaire, DATE_FORMAT(date_commentaire, '%d/%m/%Y') AS date_commentaire FROM commentaire WHERE id_news='" . $_GET["id_news"] . "' ");
        while ($donnees = $req->fetch())    {    
    ?>
    <div class="row-fluid" style="box-shadow: 5px 5px 5px 5px;background-color:beige;padding: 5px;margin-bottom:5px;border-radius:10px;"> 
    <div class="col-md-6 col-sm-12 mt-2">
      <p>
        <strong><?php echo htmlspecialchars($donnees['prenom']); ?> <?php echo htmlspecialchars($donnees['nom']); ?> le <?php echo htmlspecialchars($donnees['date_commentaire']); ?> </strong> </br>
        <?php echo nl2br(htmlspecialchars($donnees['commentaire']));?> 
        <?php echo "<a href='commentaire_supprimerok.php?id_commentaire=". $donnees["id_commentaire"] ."'>Supprimer</a>" ?>
      </p>    
    </div>
    </div> 
<?php
    } // Fin de la boucle des commentaires    
    $req->closeCursor(); 
    } 
    catch(Exception $e) 
    {    
    die('Erreur : '.$e->getMessage()); 
    } 
}
?> 
   
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/app.js"></script>
</body>

</html>