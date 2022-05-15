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

    <div class="container">
    </br>
        <div class="row" style="box-shadow:  10px 10px 10px 10px none;border-radius:10px; background-color:white;margin: 3px;">
        <h3 style="padding: 10px;">Qui sommes nous ?</h3>
            <p style="text-align: justify;padding: 15px;">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas necessitatibus eum maxime esse culpa et numquam nobis totam accusamus tenetur itaque laborum, quia reiciendis ut tempore debitis doloremque consequatur doloribus!
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit eveniet hic cumque commodi accusantium eligendi consequuntur quod, enim quis, reiciendis quibusdam! Velit cupiditate aliquid laboriosam animi similique natus deleniti dolores.
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident eius quisquam animi molestias fugiat totam aliquam eligendi ipsam et voluptatem dolore distinctio, voluptatibus voluptatum sequi doloribus necessitatibus numquam neque explicabo.
            </p>
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
        </div>
        </br>
        <div class="row" style="box-shadow:  10px 10px 10px 10px none;border-radius:10px; background-color:white;margin: 3px;">
        <h3 style="padding: 10px;">LCA votre chaîne</h3> 
            <p style="text-align: justify;padding: 15px;">
                Contact: +491759572022 | ijaeger@sternstewart.com </br>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas necessitatibus eum maxime esse culpa et numquam nobis totam accusamus tenetur itaque laborum, quia reiciendis ut tempore debitis doloremque consequatur doloribus!
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit eveniet hic cumque commodi accusantium eligendi consequuntur quod, enim quis, reiciendis quibusdam! Velit cupiditate aliquid laboriosam animi similique natus deleniti dolores.
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident eius quisquam animi molestias fugiat totam aliquam eligendi ipsam et voluptatem dolore distinctio, voluptatibus voluptatum sequi doloribus necessitatibus numquam neque explicabo.
            </p>
        </div>
        </br>
        <div class="row" style="box-shadow:  10px 10px 10px 10px none;border-radius:10px; background-color:white;margin: 3px;margin-bottom:15px;">
        <h3 style="padding: 10px;">Nos prestations</h3>
            <p style="text-align: justify;padding: 15px;">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas necessitatibus eum maxime esse culpa et numquam nobis totam accusamus tenetur itaque laborum, quia reiciendis ut tempore debitis doloremque consequatur doloribus!
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit eveniet hic cumque commodi accusantium eligendi consequuntur quod, enim quis, reiciendis quibusdam! Velit cupiditate aliquid laboriosam animi similique natus deleniti dolores.
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident eius quisquam animi molestias fugiat totam aliquam eligendi ipsam et voluptatem dolore distinctio, voluptatibus voluptatum sequi doloribus necessitatibus numquam neque explicabo.
            </p>
        </div>
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