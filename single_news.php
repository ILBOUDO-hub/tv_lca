<?php
  if(isset($_GET["submit"])){
    if(isset($_GET["id_news"])){     
        $id_news= $_GET['id_news'];
        $nom= $_POST['nom'];
        $prenom= $_POST['prenom'];
        $email= $_POST['email'];
        $message= $_POST['message'];
        try{
          $connexion = new PDO('mysql:host=localhost;dbname=tv_lca', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
          $stmt=$connexion->prepare("INSERT INTO commentaire VALUES(Null,'$id_news','$nom','$prenom','$email','$message')");
          $stmt->execute((array($id_news,$nom,$prenom,$email,$message)));
        }catch(Exception $e)
        {
          die('Erreur : '.$e->getMessage()); 
        }
        
        // header('Location:single_news.php');
        }else{
            echo "erreure dans l'éxécution de la requête";
        }
      }
?>
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
  <link rel="stylesheet" href="footer.css">
  <link rel="stylesheet" href="news.css">
  <link href="images/logo.png" rel="shortcut icon"/>
  <title>Lca-Tv</title>

  <style>
  .img-news{
  height: 600px;
  width: 100%;
  }
  @media only screen and (min-width: 320px) and (max-width: 740px) {
    .img-news{
      height: 280px;
      width: 100%;
    }
  }

  </style>
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
              <img src="admin/<?php echo htmlspecialchars($donnees['photo']); ?>" alt="Snow" class="img-news">
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
          <input type="text" class="form-control" name="nom" id="name" placeholder="Votre nom" required>
        </div>
        <div class="col-md-6 col-sm-12 mt-2">
          <input type="text" class="form-control" name="prenom" id="surname" placeholder="Votre prénom" required>
        </div>
        <div class="col-12 mt-2">
          <input type="email" class="form-control" name="email" id="mail_address" placeholder="Votre adresse mail" required>
        </div>
        <div class="col-12 mt-2">
          <textarea class="form-control" name="message" id="message" placeholder="Votre message ici" required></textarea>
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
        $req = $bdd->prepare('SELECT nom, prenom, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') 
        AS date_commentaire FROM commentaire WHERE id_news = ? ORDER BY id_commentaire DESC');    
        $req->execute(array($_GET['id_news']));  
        while ($donnees = $req->fetch())    {    
    ?>
    <div class="row-fluid" style="box-shadow: 5px 5px 5px 5px;background-color:beige;padding: 5px;margin-bottom:5px;border-radius:10px;"> 
    <div class="col-md-6 col-sm-12 mt-2">
      <p>
        <strong><?php echo htmlspecialchars($donnees['nom']); ?> <?php echo htmlspecialchars($donnees['prenom']); ?> </strong> </br>
        <?php echo nl2br(htmlspecialchars($donnees['commentaire']));?> 
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
    ?> 
   
  </div>


  <section class="footer" id="footer">
    <div class="ft_pres">
      <p><a href="#">Qui sommes nous</a></p>
      <a href="#">Se connecter</a>
      <a href="#">S'inscrire</a><br>
    </div>
    <div class="ft_com">
      <p>Service commercial</p>
      <p>+226 67 61 04 16</p>
      <p>+226 70 20 12 28</p>
    </div>
    <div class="ft_app">
      Application mobile
      <div class="play-box">
        <div>
          <a href="#"><img class="google-play" src="images/icons/google.png" alt=""></a>
        </div>
        <div>
          disponible sur <br>
          <a href="#">Google Playstore</a>
        </div>
      </div>
      <div class="ft_social">
        <div>
          <p>Réseaux Sociaux</p>
          <div class="social-media">
            <a class="social-items" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a class="social-items" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a class="social-items" href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
            <a class="social-items" href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a class="social-items" href="#"> <img class="tiktok" src="images/icons/tiktok.png" alt=""> </a>
          </div>
        </div>
      </div>
    </div>
    <div class="ft_lca">
        <a href="#"><img class="logo" src="images/logo.png" alt="logo_lca"></a>
        <p> &copy; Copyright 2022 LCA TV </p>
    </div>
  </section>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/app.js"></script>
</body>

</html>