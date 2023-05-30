<div>
  <div class="location-section">
    <h3 class="location-title">@isset($pageInfo["path"]){{$pageInfo["path"]}} @endisset Appartement - @if(isset($old_choices["region"]) && $old_choices["region"] != "*") Région {{$old_choices["region"]}} @else Toutes les Régions @endif <span>(@isset($pageInfo["nbAnnonces"]) {{$pageInfo["nbAnnonces"]}} @endisset résultats)</span></h3>
  </div>
  
    <section class="filterBody">
      <!-- Filter Sidebar Start -->
      <form class="sidebarFilter" method="POST" >
        @csrf
        <!-- Filter  By Region -->
        <div class="region">
            <label for="regionFilter" class="labelFilter mb-1">Régions</label>
            <select  wire:model="selectedRegion" wire:change="filterAnnonce" id="regionFilter" wire:ignore>
              <option selected value="*">Toutes Les Regions</option>
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
              
            
                <label>
                    <input type="checkbox" class="btnInput" value="{{ $type }}"  wire:model="typeBien" wire:change="filterAnnonce">
                    <span class="btn-checkbox">{{ $type }}</span>
                </label>
            @endforeach
          
            
  
        </div>
      
                <!-- Filter  By Budget -->

                
    @isset($pageInfo["budgetMin"])
    <div class="Budget">
      <label for="budgetFilter" class="labelFilter mb-1">Budget</label>
      <select  id="budgetFilter" wire:model="minBudget" wire:change="filterAnnonce">
        <option selected value="">Minimun</option>
          @for($i = 0; $i < 7; $i++)
            <option value="{{$pageInfo['budgetMin'] + ($i * 1000)}}" @isset($old_choices["minBudget"]){{$old_choices["minBudget"] == $pageInfo['budgetMin'] + ($i * 1000) ? "selected" : ""}}@endisset>{{$pageInfo['budgetMin'] + ($i * 1000)}} DH</option>
          @endfor
        
      </select>
      <select  id="budgetFilter" wire:model="maxBudget" wire:change="filterAnnonce">
        <option  selected value="">Maximun</option>
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
            <select wire:model="minSurface" wire:change="filterAnnonce" id="surfaceFilter">
              <option value="" selected >Minimun</option>
              @for ($i = 0; $i <= 5; $i++)
                <option value="{{ $pageInfo['surfaceMin'] + $i * 10 }}" @isset($old_choices["minSurface"]){{$old_choices["minSurface"] == $pageInfo['surfaceMin'] + ($i * 10) ? "selected" : ""}}@endisset>{{ $pageInfo['surfaceMin'] + $i * 10 }} m²</option>
              @endfor
              @for ($i = 1; $i <= 4; $i++)
                <option value="{{ $pageInfo['surfaceMin'] + $i * 100 }}" @isset($old_choices["minSurface"]){{$old_choices["minSurface"] == $pageInfo['surfaceMin'] + ($i * 100) ? "selected" : ""}}@endisset>{{ $pageInfo['surfaceMin'] + $i * 100 }} m²</option>
              @endfor 
            </select>
            <select wire:model="maxSurface" wire:change="filterAnnonce" id="surfaceFilter">
              <option value="" selected >Maximun</option>
              @for ($i = 1; $i <= 5; $i++)
              <option value="{{ $pageInfo['surfaceMin'] + $i * 10 }}" @isset($old_choices["maxSurface"]){{$old_choices["maxSurface"] == $pageInfo['surfaceMin'] + ($i * 10) ? "selected" : ""}}@endisset>{{ $pageInfo['surfaceMin'] + $i * 10 }} m²</option>
            @endfor
            @for ($i = 1; $i <= 4; $i++)
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
                <input type="checkbox" class="btnInput" wire:model="nbChambre" wire:change="filterAnnonce" value="{{ $chambre }}"
    @isset($old_choices["nbChambre"]){{ is_array($old_choices["nbChambre"]) && array_search($chambre, $old_choices["nbChambre"]) ? "checked" : "" }}@endisset>

                            <span class="btn-checkbox">{{ $chambre }}</span>
              </label>
@endforeach
          </div>
          

      </div>


  <!-- Filter  By Caractéristiques -->


  <div class="caracteristique">
    <label for="regionFilter" class="labelFilter mb-1">Caractéristiques</label>
  
    <label>
      <input type="checkbox" class="btnInput" wire:model="caracteristiques" wire:change="filterAnnonce"  value="ascenseur" @isset($old_choices["caracteristiques"]){{ in_array("ascenseur", $old_choices["caracteristiques"]) ? "checked" : "" }} @endisset>
      <span class="btn-checkbox">Ascenseur</span>
    </label>
  
    <label>
        <input type="checkbox" class="btnInput" wire:model="caracteristiques" wire:change="filterAnnonce"  value="garage" @isset($old_choices["caracteristiques"]){{ in_array("garage", $old_choices["caracteristiques"]) ? "checked" : "" }}@endisset>
        <span class="btn-checkbox">Garage</span>
    </label>
  
    <label style="margin-right: 10px">
        <input type="checkbox" class="btnInput" wire:model="caracteristiques" wire:change="filterAnnonce"  value="jardin" @isset($old_choices["caracteristiques"]){{ in_array("jardin", $old_choices["caracteristiques"]) ? "checked" : "" }}@endisset>
        <span class="btn-checkbox">Jardin</span>
    </label>
  
    <label>
        <input type="checkbox" class="btnInput" wire:model="caracteristiques" wire:change="filterAnnonce"  value="piscine" @isset($old_choices["caracteristiques"]){{ in_array("piscine", $old_choices["caracteristiques"]) ? "checked" : "" }}@endisset>
        <span class="btn-checkbox">Piscine</span>
    </label>
  
    <label style="margin-right: 10px">
        <input type="checkbox" class="btnInput" wire:model="caracteristiques" wire:change="filterAnnonce"  value="terrasse" @isset($old_choices["caracteristiques"]){{ in_array("terrasse", $old_choices["caracteristiques"]) ? "checked" : "" }}@endisset>
        <span class="btn-checkbox">Terrasse</span>
    </label>
  
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
            
            {{-- <button class="btn btn-link" id="back" aria-label="Précédent">
              <span class="fa fa-chevron-left"></span>
            </button>      --}}
  
            @foreach ($annonce->medias as  $media)
            @if($loop->first)
              <img class="slide" src="{{asset('images/'.$media->url)}}" alt="Slide">
            @endif
<<<<<<< HEAD
            @empty
              <img class="slide" src="{{ asset('images/default.jpg') }}" alt="Slide">
            @endforelse
=======
            @endforeach
>>>>>>> 07b5804a5ae18f3bfb0b5a483a89082956d22991
  
            {{-- <button class="btn btn-link" id="next" aria-label="Suivant">
              <span class="fa fa-chevron-right"></span>
            </button> --}}
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
  
  
       {{-- its very important to use :wire:key when you using more than one component  --}}
      <livewire:favorites-component :announceid="$annonce->id" :wire:key='$annonce->id'/>

          
  
      </div>
  
        @empty
            <h1>aucune annonce ne correspond à ce filtrage</h1>
        @endforelse
  
  
  
      <!-- CARD Appartement End -->
      </main>
  
      
        
        <!-- CONTAINER CARD Appartement START -->
  
        
    </section>
  @endisset

</div>
