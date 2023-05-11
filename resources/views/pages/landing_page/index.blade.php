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
    <div class="filterRecherche">
      <div class="circle1">1</div>
      <div class="circle2">2</div>
      <div class="circle3">3</div>
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

<p style="text-align: center" class="mt-5">Vous cherchez un endroit à louer ? <br> Ne cherchez pas plus loin ! Notre site web est là pour vous aider.</p>
<section class="filter-section">
  <a href="" class="filter-href">
    <div class="filter-card card1">
      <h2>VENTE</h2>
    </div>
  </a>
  <a href="" class="filter-href">
    <div class="filter-card card2">
      <h2>Location</h2>
    </div>
  </a>
  <a href="" class="filter-href">
    <div class="filter-card card3">
      <h2>Location Vacances</h2>
    </div>
  </a>
</section>

@endsection

