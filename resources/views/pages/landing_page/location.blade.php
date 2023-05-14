@extends('layouts.landingPage')

@section('title', "Location Appartement")

@section("links")
  @parent
  <link rel="stylesheet" href="{{asset("css/landing_page/location.css")}}">
@endsection

@section("content")
  <div class="location-section">
    <h3 class="location-title">@isset($pageInfo["path"]){{$pageInfo["path"]}} @endisset Appartement - @if(isset($old_choices["region"])) Région {{$old_choices["region"]}} @else Toutes les Régions @endif <span>(@isset($pageInfo["nbAnnonces"]) {{$pageInfo["nbAnnonces"]}} @endisset résultats)</span></h3>
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
              @isset($pageInfo["villes"])
                @foreach ($pageInfo["villes"] as $ville)
                    <option value="{{$ville}}" @isset($old_choices["region"]){{$old_choices["region"] == $ville ? "selected" : ""}}@endisset> {{$ville}} </option>
                @endforeach
              @endisset
            </select>

            

        </div>


        <!-- Filter  By type de bien -->


        <div class="typeBien">
            <label for="regionFilter" class="labelFilter mb-1">type de bien</label>
          
            @php
            $types_bien = ['Appartement', 'Maison', 'Villa', 'Chambres', 'Terrains', 'Fermes'];
            @endphp
            
            @foreach ($types_bien as $type)
                @php
                    $checked = '';
                    if (isset($old_choices['typesBien']) && in_array($type, $old_choices['typesBien'])) {
                        $checked = 'checked';
                    } elseif ($type === 'Appartement' && empty($old_choices['typesBien'])) {
                        $checked = 'checked';
                    }
                @endphp
            
                <label>
                    <input type="checkbox" class="btnInput" name="typeBien[]" value="{{ $type }}" {{ $checked }}>
                    <span class="btn-checkbox">{{ $type }}</span>
                </label>
            @endforeach
          
            

        </div>
        @error('typeBien')
          <div class="alert alert-danger" style=" padding : 7px"> sélectionner  un choix</div>
        @enderror
                <!-- Filter  By Budget -->

    @isset($pageInfo["budgetMin"])
        <div class="Budget">
          <label for="budgetFilter" class="labelFilter mb-1">Budget</label>
          <select name="budgetMin" id="budgetFilter">
            <option value="0" selected disabled>Minimun</option>
              @for($i = 0; $i < 7; $i++)
                <option value="{{$pageInfo['budgetMin'] + ($i * 1000)}}" @isset($old_choices["minBudget"]){{$old_choices["minBudget"] == $pageInfo['budgetMin'] + ($i * 1000) ? "selected" : ""}}@endisset>{{$pageInfo['budgetMin'] + ($i * 1000)}} DH</option>
              @endfor
            
          </select>
          <select name="budgetMax" id="budgetFilter">
            <option value="Option1" selected disabled>Maximun</option>
            @for($i = 1; $i <= 7; $i++)
                <option value="{{$pageInfo['budgetMin'] + ($i * 1000)}}" @isset($old_choices["maxBudget"]){{$old_choices["maxBudget"] == $pageInfo['budgetMin'] + ($i * 1000) ? "selected" : ""}}@endisset>{{$pageInfo['budgetMin'] + ($i * 1000)}} DH</option>
              @endfor

          </select>
        </div>
    @endisset


        <!-- Filter  By Surcafe -->

    @isset($pageInfo["surfaceMin"])
        <div class="surface">
            <label for="surfaceFilter" class="labelFilter mb-1">Surface</label>
            <select name="SurfaceMin" id="surfaceFilter">
              <option value="Option1" selected disabled>Minimun</option>
              @for ($i = 0; $i <= 5; $i++)
                <option value="{{ $pageInfo['surfaceMin'] + $i * 10 }}" @isset($old_choices["minSurface"]){{$old_choices["minSurface"] == $pageInfo['surfaceMin'] + ($i * 10) ? "selected" : ""}}@endisset>{{ $pageInfo['surfaceMin'] + $i * 10 }} m²</option>
              @endfor
              @for ($i = 1; $i <= 5; $i++)
                <option value="{{ $pageInfo['surfaceMin'] + $i * 100 }}" @isset($old_choices["minSurface"]){{$old_choices["minSurface"] == $pageInfo['surfaceMin'] + ($i * 100) ? "selected" : ""}}@endisset>{{ $pageInfo['surfaceMin'] + $i * 100 }} m²</option>
              @endfor 
            </select>
            <select name="surfaceMax" id="surfaceFilter">
              <option value="Option1" selected disabled>Maximun</option>
              @for ($i = 1; $i <= 6; $i++)
              <option value="{{ $pageInfo['surfaceMin'] + $i * 10 }}" @isset($old_choices["maxSurface"]){{$old_choices["maxSurface"] == $pageInfo['surfaceMin'] + ($i * 10) ? "selected" : ""}}@endisset>{{ $pageInfo['surfaceMin'] + $i * 10 }} m²</option>
            @endfor
            @for ($i = 1; $i <= 5; $i++)
              <option value="{{ $pageInfo['surfaceMin'] + $i * 100 }}" @isset($old_choices["maxSurface"]){{$old_choices["maxSurface"] == $pageInfo['surfaceMin'] + ($i * 100) ? "selected" : ""}}@endisset>{{ $pageInfo['surfaceMin'] + $i * 100 }} m²</option>
            @endfor 
            </select>
          </div>
      @endisset


        <!-- Filter  By Chambres -->


        <div class="nbChambre">
          <label for="regionFilter" class="labelFilter mb-1">Chambres</label>
        
          <div>
            @php
              $chambres = ["1", "2", "3", "4", "5", "+6"];
            @endphp

            @foreach($chambres as $chambre)
              <label>
                <input type="checkbox" class="btnInput" name="nbChambre[]" value="{{ $chambre }}" @isset($old_choices["nbChambre"]){{ in_array($chambre, $old_choices["nbChambre"]) ? "checked" : "" }}@else{{ $chambre == "1" ? "checked" : "" }}@endisset>
                <span class="btn-checkbox">{{ $chambre }}</span>
              </label>
@endforeach
          </div>
          

      </div>



      <!-- Filter  By Caractéristiques -->


      <div class="caracteristique">
        <label for="regionFilter" class="labelFilter mb-1">Caractéristiques</label>
      
        <label>
          <input type="checkbox" class="btnInput" name="caracteristique[]" value="ascenseur" @isset($old_choices["caracteristiques"]){{ in_array("ascenseur", $old_choices["caracteristiques"]) ? "checked" : "" }} @else {{"checked"}} @endisset>
          <span class="btn-checkbox">Ascenseur</span>
        </label>
      
        <label>
            <input type="checkbox" class="btnInput" name="caracteristique[]" value="garage" @isset($old_choices["caracteristiques"]){{ in_array("garage", $old_choices["caracteristiques"]) ? "checked" : "" }}@endisset>
            <span class="btn-checkbox">Garage</span>
        </label>
      
        <label style="margin-right: 10px">
            <input type="checkbox" class="btnInput" name="caracteristique[]" value="jardin" @isset($old_choices["caracteristiques"]){{ in_array("jardin", $old_choices["caracteristiques"]) ? "checked" : "" }}@endisset>
            <span class="btn-checkbox">Jardin</span>
        </label>
      
        <label>
            <input type="checkbox" class="btnInput" name="caracteristique[]" value="piscine" @isset($old_choices["caracteristiques"]){{ in_array("piscine", $old_choices["caracteristiques"]) ? "checked" : "" }}@endisset>
            <span class="btn-checkbox">Piscine</span>
        </label>
      
        <label style="margin-right: 10px">
            <input type="checkbox" class="btnInput" name="caracteristique[]" value="terrasse" @isset($old_choices["caracteristiques"]){{ in_array("terrasse", $old_choices["caracteristiques"]) ? "checked" : "" }}@endisset>
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
            <h1>aucune annonce ne correspond à ce filtrage</h1>
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

