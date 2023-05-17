<?php

namespace App\Http\Livewire;

use App\Models\Announce;
use Livewire\Component;
use Illuminate\Support\Facades\Request;

class FilterComponent extends Component
{
  protected  $announces;
  public $selectedRegion = '*';
  public $typeBien = [];
  public $minBudget;
  public $maxBudget;
  public $minSurface;
  public $maxSurface;
  public $nbChambre = [];
  public $caracteristiques = [];
  public $path;
  public $testVille;
  public $testType;

  public function mount($path, $testVille = null, $testType = null)
  {

    $this->path = $path;

    if (basename(parse_url(url()->current(), PHP_URL_PATH)) == "index") {
      $testType = $testType == null? "all" : $testType;
          if($testType == "all")
            $this->announces = Announce::where("typeL", $this->path)->where("city", $testVille)->get();
  
          else 
            $this->announces = Announce::where("typeL", $this->path)->where("type", $testType)->where("city", $testVille)->get();

        } 
        else 
          $this->announces = Announce::where("typeL", $this->path)->get();
    } 
    
    
  

  public function filterAnnonce()
  {
    // Reset the query builder
    $query = Announce::where("typeL", $this->path);

    // Filter by selected region
    if ($this->selectedRegion && $this->selectedRegion != "*") {
      $query->where('city', $this->selectedRegion);
    }


    // Filter by property type
    if (!empty($this->typeBien)) {
      $query->whereIn('type', $this->typeBien);
    }

    // get Annonces filtrer by budget selectionner par user:
    if (!empty($this->minBudget) || !empty($this->minBudget)) {
      $this->minBudget = $this->minBudget == null ? 0 : $this->minBudget;
      $this->maxBudget = $this->maxBudget == null ? Announce::max("price") : $this->maxBudget;
      $query->whereBetween("price", [$this->minBudget, $this->maxBudget])->orderBy('price');
    }

    // get Annonces filtrer by surface selectionner par user:
    if (!empty($this->minSurface) || !empty($this->maxSurface)) {
      $this->minSurface = $this->minSurface == null ? 0 : $this->minSurface;
      $this->maxSurface = $this->maxSurface == null ? Announce::max("surface") : $this->maxSurface;
      $query->whereBetween("surface", [$this->minSurface, $this->maxSurface])->orderBy('surface');
    }

    // Check if +6 is selected
    
    // get annonce with nbChambre
    // Filter by number of rooms
    if (!empty($this->nbChambre)) {
      if (in_array(6, $this->nbChambre)) {
          $query->where(function ($q) {
              $q->whereIn("nbRome", $this->nbChambre)->orWhere("nbRome", ">=", 6);
          });
      } else {
          $query->whereIn("nbRome", $this->nbChambre);
      }
  }

  if (!empty($this->caracteristiques)) {
    $query->where(function ($q) {
      foreach ($this->caracteristiques as $caracteristique) {
        $q->orWhere('description', 'like', '%' . $caracteristique . '%');
      }
    });
  }



    $this->announces = $query->medias()->get();
  }

  // Assign the filtered results to the $announces property




  public function render()
  {
    $villes = Announce::select("city")->distinct()->pluck('city');
    $nbAnnonces = 0;
    // pour remplir  select de budget : 
    $budgetMin =  floor(intval(Announce::where("typeL",  $this->path)->min("price") / 100)) * 100;

    // pour remplir  select de surface : 
    $surfaceMin =  floor(intval(Announce::where("typeL", $this->path)->min("surface") / 100)) * 100;



    if ($this->announces)
      $nbAnnonces = $this->announces->count();


    $pageInfo = [
      'villes' => $villes,
      "nbAnnonces" => $nbAnnonces,
      "path" => $this->path,
      'budgetMin' => $budgetMin,
      'surfaceMin' => $surfaceMin
    ];
    $old_choices = [
      "region" => $this->selectedRegion,
      // 'caracteristiques' => $this->caracteristiques,
      'nbChambre' => $this->nbChambre,
      'minSurface' => $this->minSurface,
      'maxSurface' => $this->maxSurface,
      'minBudget' => $this->minBudget,
      'maxBudget' => $this->maxBudget,
    ];

    return view('livewire.filter-component', [
      'announces' => $this->announces,
      'pageInfo' => $pageInfo,
      'old_choices' => $old_choices,
    ]);
  }
}
