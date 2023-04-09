<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="{{asset('css/landing_page.css')}}">
  <title>@yield("title")</title>
</head>
<body>

  {{----------------------- HEADER -------------------------------}}

  <nav class="navbar navbar-expand-lg" style="background-color: #EEF1F6" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand me-5" href="#">
        <img src="{{asset("img/logo.png")}}" alt="Logo" width="40" height="40" class="d-inline-block align-text-top">
        <span class="p-2 fw-semibold" style="color:#4A647F"> Darkum</span>
      </a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color:#4A647F" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Something</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">sign in</a>
          </li>
          <li class="nav-item">
            <a class="nav-link signUp" href="#">sign up</a>
          </li>
        
        </ul>


        {{-- <form class="d-flex " role="search">
          <input class="form-control me-2 bg-light" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-danger" type="submit">Search</button>
        </form> --}}
      </div>
    </div>
  </nav>
  
  {{----------------------- BODY ---------------------------------}}


@section("landingPage")
  <section class="interface mt-5 d-flex">
    <div>
      <h1 class="title">Darkum</h1>
      <h2 class="pubTitre">Trouvez Votre logement de rêve.</h2>
      <p class="pubParagraphe">
        Vous cherchez un endroit à louer ? Ne cherchez pas plus loin ! Notre site web est là pour vous aider.
      </p>
      <button class="btn">Show More</button>
    </div>
    <div>
      <img src="img/home.jpg" alt="homeImage" class="w-100 ms-5 mb-5">
    </div>
  </section>
@show








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  
</body>
</html>