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
    <!-- <img class="pattern" src="/images/pattern/pattern3.png" alt=""> -->
    <div class="pattern">
    </div>
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
                        <a class="nav-link" href="replay">Replay</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="politique.php">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Qui sommes nous?</a>
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
    <div class="dots">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <section id="video">
        <div class=" video owl-carousel">
            <div class="video-box pb-3">
                <div class="video-img-box">
                    <img src="images/emission.png" alt="">
                </div>
                <div class="video-content-box">
                    <div class="video-title-box">
                        <div class="voir-plus">
                            <a class="content-box-play" href="#">
                                <i class="fa fa-play-circle" aria-hidden="true"></i>
                                <div class="voir-plus-title">
                                    Voir la Vidéo <br>
                                    <span>Divertissement |</span>
                                </div>
                            </a>
                        </div>
                        <div class="square">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="infos-sliders owl-carousel owl-theme">
            <a href="#">
                <div class="infos-inner-slider">
                    <p>Divertissement</p>
                </div>
            </a>
            <a href="#">
                <div class="infos-inner-slider">
                    <p>Débat</p>
                </div>
            </a>
            <a href="#">
                <div class="infos-inner-slider">
                    <p>Infos et société</p>
                </div>
            </a>
        </div>
    </section>
    <section id="replays">
        <div class="banner-img"></div>
        <h2>Les derniers replays</h2>
        <div class="banner-text">
            <div class=" owl-carousel owl-theme replays-content-box">
                <img src="images/emission.png" alt="">
            </div>
        </div>
    </section>
    <section class="program" id="program">
    
  </section>
  <section class="replay" id="replay">
    <div class="replay-box">
      <div class="replay-header">
        <h1>Débats</h1>
      </div>
      <div class="replay-content">
        <div class="replay-content-carousel owl-carousel owl-theme">
          <!-- Carousel -->
        <?php
         $bdd= new PDO("mysql:host=localhost;dbname=tv_lca","root","");
         $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $eq = $bdd->query("SELECT * FROM `emissions` WHERE type_emissions='debats'");
         while($result = $eq->fetch()){
            $url = $result["photo"];
            $lien =$result["lien"];
            $titre =$result["titre"];
            $commentaire =$result["commentaire"];
            echo "
            <div class=\"single-box\">
            <div class=\"img-box\">
              <div class=\"img-box\"><img src=\"admin/$url\" alt=\"\"></div>
            </div>
            <div class=\"content-box\">
              <h3>$titre</h3>
              <p>$commentaire</p>
              <a class=\"content-box-play\" href=\"$lien\"><i class=\"fa fa-play-circle\" aria-hidden=\"true\"></i></a>
            </div>
            </div>
            ";
         }
        ?>
          <!-- Carousel ends -->
        </div>
      </div>
    </div>
  </section>


  <section class="replay" id="replay">
    <div class="replay-box">
      <div class="replay-header">
        <h1>Divertissement</h1>
      </div>
      <div class="replay-content">
        <div class="replay-content-carousel owl-carousel owl-theme">
          <!-- Carousel -->
        <?php
         $bdd= new PDO("mysql:host=localhost;dbname=tv_lca","root","");
         $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $eq = $bdd->query("SELECT * FROM `media`  ORDER BY `id_media` desc");
         while($result = $eq->fetch()){
            $url = $result["photo"];
            $lien =$result["title"];
            $titre =$result["titre"];
            $commentaire =$result["commentaire"];
            echo "
            <div class=\"single-box\">
            <div class=\"img-box\">
              <div class=\"img-box\"><img src=\"admin/$url\" alt=\"\"></div>
            </div>
            <div class=\"content-box\">
              <h3>$titre</h3>
              <p>$commentaire</p>
              <a class=\"content-box-play\" href=\"$lien\"><i class=\"fa fa-play-circle\" aria-hidden=\"true\"></i></a>
            </div>
            </div>
            ";
         }
        ?>
          <!-- Carousel ends -->
        </div>
      </div>
    </div>
  </section>


  <section class="replay" id="replay">
    <div class="replay-box">
      <div class="replay-header">
        <h1>Infos</h1>
      </div>
      <div class="replay-content">
        <div class="replay-content-carousel owl-carousel owl-theme">
          <!-- Carousel -->
        <?php
         $bdd= new PDO("mysql:host=localhost;dbname=tv_lca","root","");
         $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $eq = $bdd->query("SELECT * FROM `emissions` WHERE type_emissions='societe'");
         while($result = $eq->fetch()){
            $url = $result["photo"];
            $lien =$result["lien"];
            $titre =$result["titre"];
            $commentaire =$result["commentaire"];
            echo "
            <div class=\"single-box\">
            <div class=\"img-box\">
              <div class=\"img-box\"><img src=\"admin/$url\" alt=\"\"></div>
            </div>
            <div class=\"content-box\">
              <h3>$titre</h3>
              <p>$commentaire</p>
              <a class=\"content-box-play\" href=\"$lien\"><i class=\"fa fa-play-circle\" aria-hidden=\"true\"></i></a>
            </div>
            </div>
            ";
         }
        ?>
          <!-- Carousel ends -->
        </div>
      </div>
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