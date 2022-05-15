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
  </section>

  <div class="navbars" style="background-color: blue;margin-bottom:10px;">
    <a href="politique.php"> Politique</a> 
    <a href="economie.php"> Economie</a> 
    <a href="culture.php"> Culture</a> 
    <a href="sante.php"> Santé</a>
    <a href="technologie.php"> Technologie</a>
  </div>

	<!-- Event list section -->
	<section class="event-list-section spad">
		<div class="container">
				<!-- event list item -->
				<?php
				// test si mode modification ou création
				
					// mode modification
					//récupération de l'utilisateur
					$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;    
					$bdd = new PDO('mysql:host=localhost;dbname=tv_lca', 'root', '', $pdo_options);
					$resultat = $bdd->query("SELECT id_news,dates_news,titre, auteur, photo,contenu,SUBSTRING(contenu,1,300) AS bout_news FROM news WHERE types_news = 'politique' ");
					while ($utilisateur = $resultat->fetch()){
						$id_news = $utilisateur["id_news"];
						$photo = $utilisateur["photo"];
						$auteur = $utilisateur["auteur"];
						$date_news = $utilisateur["dates_news"];
						$titre = $utilisateur["titre"];
            $bout_news = $utilisateur["bout_news"];
					if(!$resultat){
						echo "erreur dans l'éxécution de la requête</br>";	
					}else {	
						echo"
        <div class=\"event-list\">
				<div class=\"el-item\">
					<div class=\"row\">
						<div class=\"col-md-4\">
							<img src=\"admin/$photo\" alt=\"Snow\" style=\"width:100%;max-width:100%;height: 280px;\">
						</div>
						<div class=\"col-md-8\">
							<div class=\"el-content\">
								<div class=\"el-header\">
									<h3>$titre</h3>
									<div class=\"el-metas\">
										<div class=\"el-meta\"><i class=\"fa fa-user\"></i> $auteur </div>
										<div class=\"el-meta\"><i class=\"fa fa-calendar\"></i> $date_news </div>
                    <p style=\"text-align: justify\"> $bout_news... </p>                    </br>
									</div>
								</div>
								<a href=\"single_news.php?id_news=" . $utilisateur["id_news"] ."\" class=\"btn btn-primary navbar-btn\">Read more</a>
							</div>
						</div>
					</div>
                    </br>
				</div>
				  ";}}
				?>
		</div>
	</section>

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