<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset("css/landing_page.css")}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>@yield("title")</title>
</head>
<body>
  {{----------------------- HEADER ---------------------------}}
  
  <nav class="navbar">
    <div class="brand-title">
      <img src="{{asset("img/logo.png")}}" alt="Logo" class="logoImg">
      <span class="fw-semibold logoName"> Darkum</span>
    </div>

    <!-- This is for responsive menu -->
    <a href="#" class="toggle-button">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </a>

    <!-- This is the link for the different pages -->
    <div class="navbar-links">
        <ul>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Vente</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Location</a>
          </li>
          <li class="nav-item">
            <a class="nav-link login" href="#"><i class="fa fa-user-circle-o"></i> se connecter</a>
          </li>
          <li class="nav-item">
            <a class="nav-link signUp" href="#">s'inscrire</a>
          </li>
        </ul>
      </div>
      <a class="nvAnnonce" href="#">PUBLIER UNE ANNONCE</a>
</nav>
  
  @section("content")
    <section class="header-section">
      <div class="publiciter">
        
          <p class="pubTitre h1">Trouvez Votre logement de rêve.</p>
          <p class="pubParagraphe">
            {{-- Vous cherchez un endroit à louer ? <br> Ne cherchez pas plus loin ! Notre site web est là pour vous aider. --}}
            Votre appartement idéal à portée de clic !
          </p>
      </div>    
        <div class="filterRecherche">
          <div class="zone1">
            <label>
              <input type="radio" class="btnInput" name="filter" value="option1" checked>
              <span class="btn-label" style="border-radius: 15px 1px 1px 15px">Vente</span>
            </label>
          
            <label>
                <input type="radio" class="btnInput" name="filter" value="option2">
                <span class="btn-label" style="border-radius: 1px">Location</span>
            </label>
          
            <label style="margin-right: 10px">
                <input type="radio" class="btnInput" name="filter" value="option3">
                <span class="btn-label" style="border-radius: 1px 15px 15px 1px">Immo neuf</span>
            </label>

          </div>
          <span class="hr"></span>
          <div class="zone2">
            <select name="select">
              <option value="*">Tous</option>
              <option value="maison">Maisons</option>
              <option value="appartement">Appartements</option>
              <option value="villa">Villas</option>
              <option value="chambre">Chambres</option>
            </select>
            <span style="margin-right: 10px"></span>
          </div>
          <span class="hr"></span>
          <div class="zone3 d-flex">
            <input type="text" name="searchVille" id="ville" placeholder="Où cherchez-vous">
            <button type="submit" class="btnRech">rechercher</button>
          </div>
        </div>
      
    </section>
  @show

  <script src="{{asset("js/landing_page.js")}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>