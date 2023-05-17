@extends("layouts.landingPage")
@section("title","Home")
@section("links")
  @parent
  <link rel="stylesheet" href="{{asset("css/landing_page/index.css")}}">
@endsection

@section("content")
<section class="header-section">
  <div class="publiciter">
    
      <p class="pubTitre h1">Trouvez Votre logement de rêve.</p>
      <p class="pubParagraphe">
        {{-- Vous cherchez un endroit à louer ? <br> Ne cherchez pas plus loin ! Notre site web est là pour vous aider. --}}
        Votre appartement idéal à portée de clic !
      </p>
  </div>    
    <form class="filterRecherche" action="{{route("filterIndex")}}" method="POST">
      @csrf
      <div class="circle1">1</div>
      <div class="circle2">2</div>
      <div class="circle3">3</div>
      <div class="zone1">
        <label>
          <input type="radio" class="btnInput" name="filter" value="vente" checked>
          <span class="btn-label" style="border-radius: 15px 1px 1px 15px">Vente</span>
        </label>
      
        <label>
            <input type="radio" class="btnInput" name="filter" value="location">
            <span class="btn-label" style="border-radius: 1px">Location</span>
        </label>
      
        <label style="margin-right: 10px">
            <input type="radio" class="btnInput" name="filter" value="vacance">
            <span class="btn-label" style="border-radius: 1px 15px 15px 1px">Vacance</span>
        </label>

      </div>
      <span class="hr"></span>
      <div class="zone2">
        <select name="typeBien">
          <option value="all">Tous</option>
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
    </form>
</section>

<p style="text-align: center" class="mt-5">Vous cherchez un endroit à louer ? <br> Ne cherchez pas plus loin ! Notre site web est là pour vous aider.</p>


<div class="container-Type">
  <div class="row">
    <div class="col-sm-4">
      <div class="card">
        <div class="image-container">
          <img src="{{asset("img/landing_page/location.jpg")}}" alt="article" />
        </div>
        <div class="card-footer">
          <h3>LOCATION</h3>
          <p>
            Trouvez le logement idéal pour votre prochaine location.
          </p>
          <a href="{{route("location")}}" class="read-more">Read More <span>&rarr;</span> </a>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="card">
        <div class="image-container">
          <img src="{{asset("img/landing_page/vente.jpg")}}" alt="article" />
        </div>
        <div class="card-footer">
          <h3>VENTE</h3>
          <p>
            Découvrez les meilleurs appartements à vendre dans votre région.
          </p>
          <a href="{{route("vente")}}" class="read-more">Read More <span>&rarr;</span> </a>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="card">
        <div class="image-container">
          <img src="{{asset("img/landing_page/vacance.jpg")}}" alt="article" />
        </div>
        <div class="card-footer">
          <h3>VACANCE</h3>
          <p>
            Évadez-vous avec nos locations de vacances pour des moments inoubliables.
          </p>
          <a href="{{route("vacance")}}" class="read-more">Read More <span>&rarr;</span> </a>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection

