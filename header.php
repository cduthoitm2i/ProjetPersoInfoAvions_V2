<?php
session_start();
include_once 'includes/functions.inc.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Mon projet Info Avions Airbus</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <!-- Mes CSS -->
  <link rel="stylesheet" href="./css/reset.css">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/scroll.css">





  <!-- CSS et JS Bootstrap 5 (version CDN) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <link src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link src="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  <link src="https://cdn.datatables.net/fixedheader/3.1.7/css/fixedHeader.dataTables.min.css">
  <script src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css" />
  <!--<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>-->

  <script src="https://kit.fontawesome.com/0005c4531c.js" crossorigin="anonymous"></script>

  <script src="./lib/datatables.min.js"></script>

  <!-- Mon favicon -->
  <link rel="apple-touch-icon-precomposed" sizes="57x57" href="./images/png/apple-touch-icon-57x57.png" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="./images/png/apple-touch-icon-114x114.png" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="./images/png/apple-touch-icon-72x72.png" />
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="./images/png/apple-touch-icon-144x144.png" />
  <link rel="apple-touch-icon-precomposed" sizes="60x60" href="./images/png/apple-touch-icon-60x60.png" />
  <link rel="apple-touch-icon-precomposed" sizes="120x120" href="./images/png/apple-touch-icon-120x120.png" />
  <link rel="apple-touch-icon-precomposed" sizes="76x76" href="./images/png/apple-touch-icon-76x76.png" />
  <link rel="apple-touch-icon-precomposed" sizes="152x152" href="./images/png/apple-touch-icon-152x152.png" />
  <link rel="icon" type="image/png" href="./images/png/favicon-196x196.png" sizes="196x196" />
  <link rel="icon" type="image/png" href="./images/png/favicon-96x96.png" sizes="96x96" />
  <link rel="icon" type="image/png" href="./images/png/favicon-32x32.png" sizes="32x32" />
  <link rel="icon" type="image/png" href="./images/png/favicon-16x16.png" sizes="16x16" />
  <link rel="icon" type="image/png" href="./images/png/favicon-128.png" sizes="128x128" />
  <meta name="application-name" content="&nbsp;" />
  <meta name="msapplication-TileColor" content="#FFFFFF" />
  <meta name="msapplication-TileImage" content="mstile-144x144.png" />
  <meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
  <meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
  <meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
  <meta name="msapplication-square310x310logo" content="mstile-310x310.png" />



</head>
<script>
  $(document).ready(function() {
    var btn = $('#backToTop');
    $(window).on('scroll', function() {
      if ($(window).scrollTop() > 300) {
        btn.addClass('show');
      } else {
        btn.removeClass('show');
      }
    });
    btn.on('click', function(e) {
      e.preventDefault();
      $('html, body').animate({
        scrollTop: 0
      }, '300');
    });
  });
</script>

<body>
  <!-- Ma navbar Bootstrap 5-->
  <!-- ajout du style background-color: #e3f2fd;" dans la balise nav de départ pour faire un bleu pale -->
  <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #e3f2fd;">
    <div class="container-fluid">
      <a class="navbar-brand" href="./accueil.php">
        <img src="./icones/Logo_Airbus_2014.svg" alt="Mon logo" width="200">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Avion</a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
              <!--<li><a class="dropdown-item" href="./avion_recherche.php">Rechercher un avion</a></li>-->
              <li><a class="dropdown-item" href="./avion_liste_prod.php">Liste de production</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Compagnie</a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
              <!--<li><a class="dropdown-item" href="./compagnie_recherche.php">Rechercher une compagnie</a></li>-->
              <li><a class="dropdown-item" href="./compagnie_liste.php">Liste des compagnies</a></li>
              <li><a class="dropdown-item" href="./compagnie_liste_par_pays.php">Liste par pays</a></li>
            </ul>
          </li>
          <!--<li class="nav-item">
            <a class="nav-link" href="./boutique.php">Boutique</a>
          </li>-->
          <li class="nav-item">
            <a class="nav-link" href="./photo.php">Photographie</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./contact.php">Contact</a>
          </li>
          <?php
          if (isset($_SESSION["useruid"])) {
            echo '<li class="av-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false"> <i class="fas fa-user mx-1"></i> Profil </a>
          <!-- Dropdown menu -->
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li>
              <a class="dropdown-item" href="./profil.php">Mon profil</a>
            </li>
            <li>
              <a class="dropdown-item" href="./logout.php">Déconnexion</a>
            </li>
          </ul>
        </li>';
          } else {
            echo '<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
            <i class="fas fa-user"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
            <li><a class="dropdown-item" href="./signup.php">Inscription</a></li>
            <li><a class="dropdown-item" href="./login.php">Login</a></li>
          </ul>
        </li>';
          }
          ?>
          <!--<li class="nav-item me-3 me-lg-0">
            <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i></a>
          </li>-->
        </ul>
        <form class="d-flex" role="search" method="GET" action="./controllers/SearchControllerInTableVersion1.php">
          <input class="form-control me-2" type="search" aria-label="Search" placeholder="Recherche...">
          <button class="btn btn-outline-success" type="submit">Rechercher</button>
        </form>
        <p>
          <?php
          if (isset($result)) {
            echo $result;
          }
          ?>
        </p>
      </div>
    </div>
  </nav>