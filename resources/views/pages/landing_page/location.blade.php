@extends('layouts.landingPage')

@section('title', "Location Appartement")

@section("links")
  @parent
  <link rel="stylesheet" href="{{asset("css/landing_page/location.css")}}">
@endsection

@section("content")
  @if(isset($types) && isset($announces))

  <div class="location-section">
    <h3 class="location-title">{{$types}} appartement - Région Fès-Meknès <span>(165 résultats)</span></h3>
  </div>
  <div class="typeLogement">
    <label>
      <input type="radio" class="btnInput" name="filter" value="option1">
      <span class="btn-label">Vente</span>
    </label>
  
    <label>
        <input type="radio" class="btnInput" name="filter" value="option2" checked>
        <span class="btn-label">Location</span>
    </label>
  
    <label style="margin-right: 10px">
        <input type="radio" class="btnInput" name="filter" value="option3">
        <span class="btn-label">Loc.Vacances</span>
    </label>

  </div>


    <section class="filterBody">
      <!-- Filter Sidebar Start -->
      <main class="sidebarFilter">
        <!-- Filter  By Region -->
        <div class="region">
            <label for="regionFilter" class="labelFilter mb-1">Régions</label>
            <select name="regionFilter" id="regionFilter">
              <option selected disabled>Choosir un region</option>
              <option value="Option1">Option1</option>
              <option value="Option2">Option2</option>
              <option value="Option3">Option3</option>      
            </select>

            

        </div>


        <!-- Filter  By type de bien -->


        <div class="typeBien">
            <label for="regionFilter" class="labelFilter mb-1">type de bien</label>
          
            <label>
              <input type="checkbox" class="btnInput" name="typeBien" value="option1" checked>
              <span class="btn-checkbox">Appartement</span>
            </label>
          
            <label>
                <input type="checkbox" class="btnInput" name="typeBien" value="option2">
                <span class="btn-checkbox">Maison</span>
            </label>
          
            <label style="margin-right: 10px">
                <input type="checkbox" class="btnInput" name="typeBien" value="option3">
                <span class="btn-checkbox">Villa</span>
            </label>
          
            <label>
                <input type="checkbox" class="btnInput" name="typeBien" value="option2">
                <span class="btn-checkbox">Chambres</span>
            </label>
          
            <label style="margin-right: 10px">
                <input type="checkbox" class="btnInput" name="typeBien" value="option3">
                <span class="btn-checkbox">Terrains</span>
            </label>
          
            <label>
                <input type="checkbox" class="btnInput" name="typeBien" value="option2">
                <span class="btn-checkbox">Fermes</span>
            </label>
          
            

        </div>

                <!-- Filter  By Budget -->

        <div class="Budget">
          <label for="budgetFilter" class="labelFilter mb-1">Budget</label>
          <select name="budgetMin" id="budgetFilter">
            <option value="Option1" selected disabled>Minimun</option>
            <option value="Option2">Option2</option>
            <option value="Option3">Option3</option>
          </select>
          <select name="budgetMax" id="budgetFilter">
            <option value="Option1" selected disabled>Maximun</option>
            <option value="Option2">Option2</option>
            <option value="Option3">Option3</option>
          </select>
        </div>


        <!-- Filter  By Surcafe -->

        <div class="surface">
            <label for="surfaceFilter" class="labelFilter mb-1">Surface</label>
            <select name="budgetMin" id="surfaceFilter">
              <option value="Option1" selected disabled>Minimun</option>
              <option value="Option2">Option2</option>
              <option value="Option3">Option3</option>
            </select>
            <select name="surfaceMax" id="surfaceFilter">
              <option value="Option1" selected disabled>Maximun</option>
              <option value="Option2">Option2</option>
              <option value="Option3">Option3</option>
            </select>
        </div>


        <!-- Filter  By Chambres -->


        <div class="nbChambre">
          <label for="regionFilter" class="labelFilter mb-1">Chambres</label>
        
          <div>
            <label>
              <input type="checkbox" class="btnInput" name="nbChambre" value="option1" checked>
              <span class="btn-checkbox">1</span>
            </label>
          
            <label>
                <input type="checkbox" class="btnInput" name="nbChambre" value="option2">
                <span class="btn-checkbox">2</span>
            </label>
          
            <label>
                <input type="checkbox" class="btnInput" name="nbChambre" value="option3">
                <span class="btn-checkbox">3</span>
            </label>
          
            <label>
                <input type="checkbox" class="btnInput" name="nbChambre" value="option2">
                <span class="btn-checkbox">4</span>
            </label>
          
            <label>
                <input type="checkbox" class="btnInput" name="nbChambre" value="option3">
                <span class="btn-checkbox">5</span>
            </label>
          
            <label>
                <input type="checkbox" class="btnInput" name="nbChambre" value="option2">
                <span class="btn-checkbox">+6</span>
            </label>
          </div>
          

      </div>



      <!-- Filter  By Caractéristiques -->


      <div class="caracteristique">
        <label for="regionFilter" class="labelFilter mb-1">Caractéristiques</label>
      
        <label>
          <input type="checkbox" class="btnInput" name="caracteristique" value="option1" checked>
          <span class="btn-checkbox">Ascenseur</span>
        </label>
      
        <label>
            <input type="checkbox" class="btnInput" name="caracteristique" value="option2">
            <span class="btn-checkbox">Garage</span>
        </label>
      
        <label style="margin-right: 10px">
            <input type="checkbox" class="btnInput" name="caracteristique" value="option3">
            <span class="btn-checkbox">Jardin</span>
        </label>
      
        <label>
            <input type="checkbox" class="btnInput" name="caracteristique" value="option2">
            <span class="btn-checkbox">Piscine</span>
        </label>
      
        <label style="margin-right: 10px">
            <input type="checkbox" class="btnInput" name="caracteristique" value="option3">
            <span class="btn-checkbox">Terrasse</span>
        </label>
      
        

    </div>
      </main>
    <!-- Filter Sidebar End -->



      <!-- CONTAINER CARD Appartement START -->




      <main class="container-appartement">
        <!-- CARD Appartement START -->

        @forelse ($announces as $annonce)
        <div class="card-appartement">


            

          <div class="card-image">
            <button class="btn btn-link" id="back" aria-label="Précédent">
              <span class="fa fa-chevron-left"></span>
            </button>          
            @foreach ($annonce->medias as $media)

              <img src="{{asset($media->url)}}" alt="image">
            @endforeach

            <button class="btn btn-link" id="next" aria-label="Suivant">
              <span class="fa fa-chevron-right"></span>
            </button>
            <div class="card-price">
              {{$annonce->price}}
            </div>
          </div>

          <div class="card-description">


              <h1>{{$annonce->title}}</h1>
              <span>{{$annonce->nbRome}} chambres, {{$annonce->surface}} m²</span>
              <h2>{{$annonce->city}}</h2>
              <p class="cutoof-text">
                {{$annonce->description}}
              </p>
              <a href="{{ route('announces.show', $annonce->id) }}" class="btn">En savoir plus </a>

              


          </div>



          <div class="favorite-button">
            <i class="fa-sharp fa-regular fa-heart"></i>
          </div>

          

      </div>

        @empty
            <h1>empty Posts</h1>
        @endforelse



      <!-- CARD Appartement End -->
      </main>

      
        
        <!-- CONTAINER CARD Appartement START -->

        
    </section>

    @endif

    <script>
      $('input[name="typeBien"]').change(function() {
  var types = [];
  $('input[name="typeBien"]:checked').each(function() {
    types.push($(this).val());
  });
  $.ajax({
    type: "POST",
    url: "/filter",
    data: { types: types },
    success: function(response) {
      // Mettre à jour le contenu de la page avec les annonces filtrées
    },
    error: function(xhr) {
      console.log(xhr.responseText);
    }
  });
});
    </script>
@endsection

@section("script")
  <script src="{{asset("js/landing_page/location.js")}}"></script>
@endsection

