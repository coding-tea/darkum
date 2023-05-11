<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{asset("css/landing_page/layout.css")}}">
  @yield("links")
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Roboto+Flex:opsz,wght@8..144,100;8..144,300;8..144,500;8..144,700;8..144,900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield("title")</title>


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  <style>
    .announceContainer{
      width: 100%;
      padding: 40px 200px;
      background-color: #f6f3fe;
    }
    .announce{
      width: 100%;
      padding: 30px 20px;
      background-color: #fff;
      border-radius: 8px;
    }
    .heading{
      font-size: 18px;
      letter-spacing: 2px;
      text-transform: uppercase;
    }
    .announceDescription{
      background-color: #f6f3fe;
      border-radius: 10px;
      padding: 20px;
      letter-spacing: 1px;
    }

    .heading, .announceDescription,.table{
      margin-bottom: 15px;
    }

    .ctaContainer{
      padding: 30px;
      text-align: center;
    }

    .cta{
      padding: 10px 20px;
      background-color: #09375D;
      text-transform: uppercase;
      letter-spacing: 1px;
      border-radius: 2px;
      margin: 10px auto;
      transition: .4s ease;
      text-decoration: none;
      color: #f6f3fe;
    }
    .cta:hover{
      background-color: #f6f3fe;
      border: 2px solid #09375D;
      color: #09375D;
      font-weight: 500;
    }

    .comments{
      width: 100%;
    }

    .comments .container, .comments .card, .comments .card-body,.comments .form{
      width: 100%;
      border: none;
    }

    .comments .card-body{
      width: 100%;
      border: 1px solid rgba(0, 0, 0, 0.1);
      border-radius: 5px;
      box-shadow: 1px 2px 10px rgba(0, 0, 0, 0.1);
    }
  </style>

</head>
<body>
  
  {{----------------------- HEADER ---------------------------}}
  
<nav class="menu">

  <a href="#" class="nav-icon" aria-label="homepage" aria-current="page">
  <a href="#" class="nav-icon" id="forLogo" aria-label="homepage" aria-current="page">
    <img src="{{asset("img/landing_page/logo.png")}}" alt="Logo" class="logoImg">
    <span>Darkum</span>
  </a>

  <div class="main-navlinks">
    <button type="button" class="forMedia"  aria-label="Toggle Navigation" aria-expanded="false">
        <span></span>
        <span></span>
        <span></span>
    </button>
    <div class="navlinks-container">
      <a href="/" aria-current="page">Home</a>
      <a href="#">Vente</a>
      <a href="#">Location</a>
      <a href="contact">Contact</a>
      <button class="nvAnnonce">Publier Une Annonce</button>
    </div>
  </div>

  <div class="nav-authentication">
    <a href="#" class="user-toggler" aria-label="Sign in page">
      <img src="{{asset("img/user.svg")}}" alt="user icon" />
    </a>
    <div class="sign-btns">
      <button type="button">Se connecter</button>
      <button type="button">Sign Up</button>
    </div>
  </div>
  
</nav>



  
  @yield("content")
  
  


{{----------------------------- FOOTER ------------------------------------------}}

<footer class="footer">
  <div class="container">
    {{-- <div class="row"> --}}
      <div class="footer-col">
        <ul>
          <li class="footerLogo"><a href="#"><img src="{{asset("img/landing_page/logo.png")}}" width="80" height="100" alt="Logo"> <span>Darkum</span></a></li>
        </ul>
      </div>
      <div class="footer-col">
        <ul>
          <li><a href="#">Publier Une Annonce</a></li>
          <li><a href="#">Inscrivez-vous</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <ul>
          <li><a href="about">Qui sommes nous?</a></li>
          <li><a href="#">FAQ</a></li>
          <li><a href="contact">Contactez-nous</a></li>
          <li><a href="privacy">Conditions d'utilisation</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <div class="social-links">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-linkedin-in"></i></a>
        </div>
      </div>
    {{-- </div> --}}
  </div>
  <div class="bottom-details">
    <div class="bottom_text">
      <span class="copyright_text">Copyright © 2023 <a href="#"> Darkum. </a>Tous droits réservés</span>
    </div>
  </div>
</footer>

















  <script src="{{asset("js/landing_page/index.js")}}"></script>
  <script src="{{asset("js/landing_page/layout.js")}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>