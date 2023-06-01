<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{asset("css/landing_page/layout.css")}}">
  @yield("links")
  @yield("link")
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Roboto+Flex:opsz,wght@8..144,100;8..144,300;8..144,500;8..144,700;8..144,900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield("title")</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
  
  <style>

    *{
      box-sizing: border-box;
    }
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

    .price{
      color: #29a160;
      font-weight: bold;
      /* padding: 20px; */
      font-size: 25px;
      letter-spacing: 1px;
    }

    .headingShow{
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 18px;
      letter-spacing: 2px;
      text-transform: uppercase;
    }
    .heading{
      text-align: center;
      font-size: 18px;
      letter-spacing: 2px;
      text-transform: uppercase;
    }

    .table{
      padding: 20px 60px;
    }
    .announceDescription{
      background-color: #f6f3fe;
      border-radius: 10px;
      padding: 20px;
      letter-spacing: 1px;
    }

    .announceDescription b{
      text-transform: uppercase;
    }

    .heading, .announceDescription,.table{
      margin-bottom: 40px;
    }

    .ctaContainer{
      padding: 30px;
      text-align: center;
      margin-bottom: 50px;
    }

    .cta{
      padding: 10px 20px;
      background-color: #29a160;
      text-transform: uppercase;
      letter-spacing: 1px;
      border-radius: 2px;
      margin: 10px auto;
      text-decoration: none;
      color: #f6f3fe;
      transition:all 1s ease;
    }
    .cta:hover{
      border-radius: 30px;
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

    body{
      overflow-x: hidden;
      background-color: #eaeaea;
      font-family: sans-serif
    }

    .menu{
      padding: 7px 150px;
      background-color: #fff;
      color: rgba(0, 0, 0, 0.5);
      box-shadow: 5px 10px 12px rgba(0, 0, 0, 0.1);
    }

    .menu a, .main-navlinks .navlinks-container a{
      color: rgba(0, 0, 0, 0.5);
      font-size: 18px;
      outline: none;
    }

    .sign a{
      text-transform: uppercase;
      letter-spacing: 1px;
      font-weight: bold;
      text-decoration: none;
      font-size: 14px;
      margin: 0;
      color: #fff;
    }

    .sign .signA{
      padding: 0;
      margin-right: 10px;
      color: #4e73de;
    }


    .loginBtn{
      background-color: #4e73de;
      color: #fff;
      padding: 7px 10px;
      border-radius: 3px;
      transition: .4s ease;
      border: none;
      border-radius: 5px;
      /* margin-right: 5px; */
    }

    .nvAnnonce:hover{
      border-radius: 20px;
    }
    .loginBtn:hover{
      opacity: .8;
    }
    .signB:hover a{
      color: #4e73de;
    }
    .header-section{
      background: linear-gradient(#4e73de, #36b9cc);
      color: white;
      height: 100vh;
      background-attachment: fixed;
      background-repeat: no-repeat;
      background-size: cover;
      display: flex;
      justify-content: center;
      flex-direction: column;
      clip-path: polygon(100% 0, 100% 100%, 74% 93%, 44% 100%, 22% 93%, 0 100%, 0 0);
    }
    .publiciter{
      margin-bottom: 50px;
    }
    .publiciter .h1{
      font-weight: bold;
      letter-spacing: 2px;
      background: none;
      font-size: 60px;
      /* text-shadow: 1px 1px 30px rgba(0, 0, 0, 0.5); */
    }
    .publiciter .pubParagraphe{
      font-weight: bold;
      letter-spacing: 2px;
      background: none;
      font-size: 20px;
      /* text-shadow: 1px 1px 30px rgba(0, 0, 0, 0.5); */
    }
    .filterRecherche{
      width: 60%;
      padding: 20px 10px;
      border-radius: 5px;
    }
    .bottom_text{
      background-color: #36b9cc;
      border: none;
    }
    .footer{
      background: linear-gradient(#4e73de, #36b9cc);
    }
    .darkum{
      color: white;
      cursor: pointer;
      font-weight: bold;
    }
    .btnRech{
      background-color: #4e73de;
      color: #fff;
      padding: 7px 20px;
      transition: .4s ease;
    }
    .btnRech:hover{
      background-color: #fff;
      border: 2px solid #4e73de;
      color: #4e73de;
    }
    .footer{
      margin-top: 0;
    }

    .logoImg{
      width: 160px;
    }

    .footerDarkum{
      width: 200px;
    }

    .help{
      background-color: #eaeaea;
    }

    .help .card-about h1{
      border-radius: 5px;
      background-color: #4e73de;
      text-shadow: none;
      font-size: 15px;
    }

    .help .card-text h1{
      border-radius: 5px;
      background-color: #4e73de;
      text-shadow: none;
      font-size: 15px;
    }

    .help .contact #btn-contact{
      background-color: #29a160;
      padding: 7px 20px;
      border-radius: 5px;
    }

    .filterBody, .location-section{
      background-color: #eaeaea;
    }

    .sidebarFilter{
      background-color: #fff;
      color: rgba(0, 0, 0, .7);
      padding: 20px;
      box-shadow: 2px 5px 20px rgba(0, 0, 0, .2);
    }

    .btn-checkbox{
      background-color: #4e73de;
      color: #fff;
      font-weight: bold;
    }

    .btn-checkbox:not(.nbChambre .btn-checkbox){
      letter-spacing: 1px;
    }

    .btn-checkbox:hover{
      opacity: .8;
      background-color: #4e73de;
    }

    #budgetFilter, #surfaceFilter, #regionFilter{
      color: #4e73de;
      background-color: #fff;
    }

    .btnFiltrer{
      width: 100%;
      border-radius: 5px;
      background-color: #4e73de;
      color: #fff;
      font-weight: bold;
      letter-spacing: 2px;
      text-transform: uppercase;
    }

    .card-price{
      background-color: #29a160;
      color: white;
      border-radius: 5px;
    }

    .card-description h1{
      color: #4e73de;
    }

    .card-description .btn{
      border-radius: 5px;
      background-color: #4e73de;
      color: #fff;
      transition: .4s ease;
    }

    .card-description .btn:hover{
      background-color: #fff;
      color: #4e73de;
      border: 1px solid #4e73de;
    }

    .card-appartement{
      box-shadow: 2px 5px 20px rgba(0, 0, 0, .2);
    }

    .mainImage img{
      width: 100%;
      /* height: 620px; */
    }

    .allImages{
      width: 100%;
      display: flex;
      justify-content: space-around;
      align-items: center;
      padding: 15px;
      flex-wrap: wrap;
    }

    .allImages img{
      width: 25%;
      margin-right: 10px;
    }

    .slidshow{
      padding: 20px;
      /* height: 520px; */
    }

    .slidshow img{
      max-height: 600px;
    }

    .announcesContainer{
      text-align: center;
      padding: 40px;
    }

    .announces{
      display: flex;
      justify-content: center;
      align-items: center;
      flex-wrap: wrap;
      width: 100%;
    }

    .announces a{
      text-decoration: none;
    }

    .announceOne{
      margin-right: 15px;
      width: 22%;
      padding: 15px;
      box-shadow: 2px 4px 15px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
      border: 1px solid rgba(0, 0, 0, 0.1);
      min-height: 230px;
      transition: .4s ease;
    }

    .announceOne img{
      max-width: 100%;
      margin-bottom: 10px;
      border-radius: 10px;
    }

    .announceOne .prix{
      color: #29a160;
      font-weight: 500;
      letter-spacing: 1px;
      font-size: 13px;
    }
    .announceOne .title{
      color: rgba(0, 0, 0, 0.6);
      font-weight: 500;
      letter-spacing: 1px;
      font-size: 12px;
      padding: 5px 0;
    }

    .announceOne:hover{
      transform: scale(1.1);
    }

    .report{
      padding: 30px;
      text-align: center;
      border-top: 1px solid rgba(0, 0, 0, 0.1);
      border-width: 60%;
    }

    .report h3{
      color: rgba(0, 0, 0, 0.5);
      letter-spacing: 1px;
      font-size: 14px;
      margin-bottom: 20px;
    }

    .report .reportCta{
      text-decoration: none;
      text-transform: uppercase;
      padding: 8px 20px;
      color: #d13649;
      border: 1px solid #d13649;
      border-radius: 100px;
      transition: .2s ease;
    }

    .report .reportCta:hover{
      background-color: #F9EAEA;
    }

    .firstCta{
      background-color: #fff;
      border: 2px solid #4e73de;
      margin-left:5px;
      color: #4e73de;
      font-weight: 500;
    }

    .table{
      text-transform: uppercase;
      letter-spacing: 1px;
      font-size: 15px;
    }

    @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&family=Noto+Sans+Arabic:wght@100;200;300&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    body{
      font-family: 'Poppins', sans-serif;
    }

    #map {
      height: 350px; margin: 30px 0;
    }

    .info{
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      min-height: 100px;
      flex-wrap: wrap;
      padding: 30px 0;
    }

    .info_item{
      width: 20%;
      margin-left: 10px;
      padding: 20px;
      border-radius: 5px;
      height: 100px;
      background-color: rgba(78, 115, 222, .1);
      text-align: center;
      /* box-shadow: 1px 2px 8px rgba(0, 0, 0, .1); */
    }

    .info_icon{
      color: #4e73de;
    }

    .info_title{
      text-transform: uppercase;
      font-size: 13px;
      letter-spacing: 1px;
      padding: 15px 0 0 0;
    }
    </style>

@livewireStyles

</head>
<body>
  
  {{----------------------- HEADER ---------------------------}}
  
<nav class="menu">

  <a href="/" class="nav-icon" aria-label="homepage" aria-current="page">
  <a href="/" class="nav-icon" id="forLogo" aria-label="homepage" aria-current="page">
    <img src="{{asset("img/darkum-blue.png")}}" alt="Logo" class="logoImg">
    {{-- <span>Darkum</span> --}}
  </a>

  <div class="main-navlinks">
    <button type="button" class="forMedia"  aria-label="Toggle Navigation" aria-expanded="false">
        <span></span>
        <span></span>
        <span></span>
    </button>
    <div class="navlinks-container">
      {{-- <a href="/" aria-current="page" class="btn">Home</a> --}}
      <a href="{{route("vente")}}" class="btn">Vente</a>
      <a href="{{route("location")}}" class="btn">Location</a>
      <a href="{{route("vacance")}}" class="btn">vacances</a>
      <a href="/contact" class="btn">Contact</a>
      <a href="{{ (auth()->user()?->role == 'admin')?route('annonces.create'):route('announces.create') }}" class="nvAnnonce" style="color: #4e73de;font-size: 15px;">Publier Une Annonce</a>
    </div>
  </div>

  <div class="nav-authentication">
    <a href="#" class="user-toggler" aria-label="Sign in page">
      <img src="{{asset("img/user.svg")}}" alt="user icon" />
    </a>
    <div class="sign">

      @guest
      <a href="{{ route('login') }}" class="signA">Sign in <i class="fa-solid fa-right-to-bracket"></i></a>
      <a href="{{ route('register') }}">
      <button type="button" class="loginBtn signB">Sign up  <i class="fa-regular fa-floppy-disk"></i></button>
      </a>
      @endguest
      @auth
        <div class="d-flex justify-content-around">
          <form action="{{ route('logout') }}" method="post">
            @csrf
            <a title="dashboard" href="{{ (auth()->user()->role == 'admin')?route('dashboard.index'):route('user.index') }}"><button type="button" class="loginBtn signB"><i class="fa-solid fa-circle-user"></i> Dashboard</button></a>
            <a href="#" title="logout"><button class="loginBtn Logout rounded" style="background-color: #d13649" type='submit'><i class="fa-solid fa-right-to-bracket"></i></button></a>
          </form>
        </div>
      @endauth
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
          <li class="footerLogo"><a href="#"><img src="{{asset("img/darkum-white.png")}}" width="80" height="100" alt="Logo" class="footerDarkum"></a></li>
        </ul>
      </div>
      <div class="footer-col">
        <ul>
          <li><a href="{{ (auth()->user()?->role == 'admin')?route('annonces.create'):route('announces.create') }}">Publier Une Annonce</a></li>
          <li><a href="/register">Inscrivez-vous</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <ul>
          <li><a href="about">Qui sommes nous?</a></li>
          <li><a href="about">FAQ</a></li>
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
      <span class="copyright_text">Copyright © 2023 <a href="/" class="darkum"> Darkum. </a>Tous droits réservés</span>
    </div>
  </div>
</footer>

  <script src="{{asset("js/landing_page/index.js")}}"></script>
  <script src="{{asset("js/landing_page/layout.js")}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  @yield("script")

  @livewireScripts
</body>
</html>