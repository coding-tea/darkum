@extends('layouts.landingPage')

@section('title', "Location Appartement")

@section("links")
  @parent
  <link rel="stylesheet" href="{{asset("css/landing_page/location.css")}}">
@endsection

@section("content")
  <div class="location-section">
    <h3 class="location-title">@isset($path){{$path}} @endisset Appartement - @if(isset($region)) Région {{$region}} @else Toutes les Régions @endif <span>(@isset($nbAnnonces) {{$nbAnnonces}} @endisset résultats)</span></h3>
  </div>
  {{-- <div class="typeLogement">
    <label>
      <input type="radio" class="btnInput" name="filter" value="option1">
      <span class="btn-label" href="{{route("vente")}}">Vente</span>
    </label>
  
    <label>
        <input type="radio" class="btnInput" name="filter" value="option2" checked>
        <span class="btn-label" href="{{route("location")}}">Location</span>
    </label>
  
    <label style="margin-right: 10px">
        <input type="radio" class="btnInput" name="filter" value="option3">
        <span class="btn-label" href="{{route("location")}}">Loc.Vacances</span>
    </label>

  </div> --}}


    <section class="filterBody">
      <!-- Filter Sidebar Start -->
      <form class="sidebarFilter" action="{{ route('filterAnnonce')}}" method="POST">
        @csrf
        <!-- Filter  By Region -->
        <div class="region">
            <label for="regionFilter" class="labelFilter mb-1">Régions</label>
            <select name="regionFilter" id="regionFilter">
              <option selected disabled>Choosir un region</option>
              @isset($villes)
                @foreach ($villes as $ville)
                    <option value="{{$ville}}"> {{$ville}} </option>
                @endforeach
              @endisset
            </select>

            

        </div>


        <!-- Filter  By type de bien -->


        <div class="typeBien">
            <label for="regionFilter" class="labelFilter mb-1">type de bien</label>
          
            <label>
              <input type="checkbox" class="btnInput" name="typeBien[]" value="Appartement" checked>
              <span class="btn-checkbox">Appartement</span>
            </label>
          
            <label>
                <input type="checkbox" class="btnInput" name="typeBien[]" value="Maison">
                <span class="btn-checkbox">Maison</span>
            </label>
          
            <label style="margin-right: 10px">
                <input type="checkbox" class="btnInput" name="typeBien[]" value="Villa">
                <span class="btn-checkbox">Villa</span>
            </label>
          
            <label>
                <input type="checkbox" class="btnInput" name="typeBien[]" value="Chambres">
                <span class="btn-checkbox">Chambres</span>
            </label>
          
            <label style="margin-right: 10px">
                <input type="checkbox" class="btnInput" name="typeBien[]" value="Terrains">
                <span class="btn-checkbox">Terrains</span>
            </label>
          
            <label>
                <input type="checkbox" class="btnInput" name="typeBien[]" value="Fermes">
                <span class="btn-checkbox">Fermes</span>
            </label>
          
            

        </div>
        @error('typeBien')
          <div class="alert alert-danger"> Veuillez sélectionner au moins un choix</div>
        @enderror
                <!-- Filter  By Budget -->

        <div class="Budget">
          <label for="budgetFilter" class="labelFilter mb-1">Budget</label>
          <select name="budgetMin" id="budgetFilter">
            <option value="0" selected disabled>Minimun</option>
            @isset($budgetMin)
            <option value="{{$budgetMin}}">{{$budgetMin}} DH</option>
            <option value="{{$budgetMin + 1000}}">{{$budgetMin + 1000}} DH</option>
            <option value="{{$budgetMin + 2000}}">{{$budgetMin + 2000}} DH</option>
            <option value="{{$budgetMin + 3000}}">{{$budgetMin + 3000}} DH</option>  
            <option value="{{$budgetMin + 4000}}">{{$budgetMin + 4000}} DH</option>  
            <option value="{{$budgetMin + 5000}}">{{$budgetMin + 5000}} DH</option>  
            <option value="{{$budgetMin + 6000}}">{{$budgetMin + 6000}} DH</option>  
            <option value="{{$budgetMin + 7000}}">{{$budgetMin + 7000}} DH</option>  
            @endisset
          </select>
          <select name="budgetMax" id="budgetFilter">
            <option value="Option1" selected disabled>Maximun</option>
            @isset($budgetMin)
            <option value="{{$budgetMin + 1000}}">{{$budgetMin + 1000}} DH</option>
            <option value="{{$budgetMin + 2000}}">{{$budgetMin + 2000}} DH</option>
            <option value="{{$budgetMin + 3000}}">{{$budgetMin + 3000}} DH</option>
            <option value="{{$budgetMin + 4000}}">{{$budgetMin + 4000}} DH</option>
            <option value="{{$budgetMin + 5000}}">{{$budgetMin + 5000}} DH</option>
            <option value="{{$budgetMin + 6000}}">{{$budgetMin + 6000}} DH</option>
            <option value="{{$budgetMin + 7000}}">{{$budgetMin + 7000}} DH</option>
            <option value="{{$budgetMin + 8000}}">{{$budgetMin + 8000}} DH</option>

            @endisset
          </select>
        </div>


        <!-- Filter  By Surcafe -->

        <div class="surface">
            <label for="surfaceFilter" class="labelFilter mb-1">Surface</label>
            <select name="SurfaceMin" id="surfaceFilter">
              <option value="Option1" selected disabled>Minimun</option>
              @isset($surfaceMin)
              <option value="{{$surfaceMin}}">{{$surfaceMin}} m²</option>
              <option value="{{$surfaceMin + 10}}">{{$surfaceMin + 10}} m²</option>
              <option value="{{$surfaceMin + 20}}">{{$surfaceMin + 20}} m²</option>
              <option value="{{$surfaceMin + 30}}">{{$surfaceMin + 30}} m²</option>  
              <option value="{{$surfaceMin + 40}}">{{$surfaceMin + 40}} m²</option>  
              <option value="{{$surfaceMin + 100}}">{{$surfaceMin + 100}} m²</option>  
              <option value="{{$surfaceMin + 200}}">{{$surfaceMin + 200}} m²</option>  
              <option value="{{$surfaceMin + 300}}">{{$surfaceMin + 300}} m²</option>  
              <option value="{{$surfaceMin + 400}}">{{$surfaceMin + 400}} m²</option>  
              <option value="{{$surfaceMin + 500}}">{{$surfaceMin + 500}} m²</option>  
              @endisset
            </select>
            <select name="surfaceMax" id="surfaceFilter">
              <option value="Option1" selected disabled>Maximun</option>
              @isset($surfaceMin)
              <option value="{{$surfaceMin + 10}}">{{$surfaceMin + 10}} m²</option>
              <option value="{{$surfaceMin + 20}}">{{$surfaceMin + 20}} m²</option>
              <option value="{{$surfaceMin + 30}}">{{$surfaceMin + 30}} m²</option>  
              <option value="{{$surfaceMin + 40}}">{{$surfaceMin + 40}} m²</option>  
              <option value="{{$surfaceMin + 100}}">{{$surfaceMin + 100}} m²</option>  
              <option value="{{$surfaceMin + 200}}">{{$surfaceMin + 200}} m²</option>  
              <option value="{{$surfaceMin + 300}}">{{$surfaceMin + 300}} m²</option>  
              <option value="{{$surfaceMin + 400}}">{{$surfaceMin + 400}} m²</option>  
              <option value="{{$surfaceMin + 500}}">{{$surfaceMin + 500}} m²</option>  
              @endisset
            </select>
        </div>


        <!-- Filter  By Chambres -->


        <div class="nbChambre">
          <label for="regionFilter" class="labelFilter mb-1">Chambres</label>
        
          <div>
            <label>
              <input type="checkbox" class="btnInput" name="nbChambre[]" value="1" checked>
              <span class="btn-checkbox">1</span>
            </label>
          
            <label>
                <input type="checkbox" class="btnInput" name="nbChambre[]" value="2">
                <span class="btn-checkbox">2</span>
            </label>
          
            <label>
                <input type="checkbox" class="btnInput" name="nbChambre[]" value="3">
                <span class="btn-checkbox">3</span>
            </label>
          
            <label>
                <input type="checkbox" class="btnInput" name="nbChambre[]" value="4">
                <span class="btn-checkbox">4</span>
            </label>
          
            <label>
                <input type="checkbox" class="btnInput" name="nbChambre[]" value="5">
                <span class="btn-checkbox">5</span>
            </label>
          
            <label>
                <input type="checkbox" class="btnInput" name="nbChambre[]" value="6">
                <span class="btn-checkbox">+6</span>
            </label>
          </div>
          

      </div>



      <!-- Filter  By Caractéristiques -->


      <div class="caracteristique">
        <label for="regionFilter" class="labelFilter mb-1">Caractéristiques</label>
      
        <label>
          <input type="checkbox" class="btnInput" name="caracteristique[]" value="ascenseur" checked>
          <span class="btn-checkbox">Ascenseur</span>
        </label>
      
        <label>
            <input type="checkbox" class="btnInput" name="caracteristique[]" value="garage">
            <span class="btn-checkbox">Garage</span>
        </label>
      
        <label style="margin-right: 10px">
            <input type="checkbox" class="btnInput" name="caracteristique[]" value="jardin">
            <span class="btn-checkbox">Jardin</span>
        </label>
      
        <label>
            <input type="checkbox" class="btnInput" name="caracteristique[]" value="piscine">
            <span class="btn-checkbox">Piscine</span>
        </label>
      
        <label style="margin-right: 10px">
            <input type="checkbox" class="btnInput" name="caracteristique[]" value="terrasse">
            <span class="btn-checkbox">Terrasse</span>
        </label>
      
        
        
      </div>
      <div id="btnFilter">
        <button type="submit" class="btnFiltrer">Filtrer </button>
      </div>
      </form>
    <!-- Filter Sidebar End -->



      <!-- CONTAINER CARD Appartement START -->



      @isset($announces)
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
              {{$annonce->price}} DH
            </div>
          </div>

          <div class="card-description">


              <h1>{{$annonce->title}}</h1>
              <span>{{$annonce->type}}, {{$annonce->nbRome}} chambres, {{$annonce->surface}} m²</span>
              <h2>{{$annonce->city}}</h2>
              <p class="cutoof-text">
                {{$annonce->description}}
              </p>
              <a href="{{ route('show', $annonce->id) }}" class="btn">En savoir plus </a>

              


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

    @endisset

    
@endsection

@section("script")
  <script src="{{asset("js/landing_page/location.js")}}"></script>
@endsection

