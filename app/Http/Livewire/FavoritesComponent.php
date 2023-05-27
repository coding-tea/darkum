<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use App\Models\Favorit as ModelsFavorit;
use Livewire\Component;

class FavoritesComponent extends Component
{
  public $favorite = null;
  public $announceid = null;
  public $favoris = null;

  public function mount(){
    if(Auth::check()){
      $query =  ModelsFavorit::where('userId', auth()->user()->id)->where('AnnounceId', $this->announceid)->exists();
      $this->favorite = $query;
    }
  }
  public function toggleFavorite()
  {
    if(!Auth::check()){
      return redirect()->route('login');
    }
    
    $this->favorite = !$this->favorite;
    if($this->favorite == false){
      if(ModelsFavorit::where('userId', auth()->user()->id)->where('AnnounceId', $this->announceid)->exists()){
        ModelsFavorit::where('userId', auth()->user()->id)->where('AnnounceId', $this->announceid)->delete();
      }
    }
    else ModelsFavorit::create(['AnnounceId' => $this->announceid,'userId' => auth()->id()
  ]);
  }
  public function render()
  {
    return view('livewire.favorites-component');
  }
}
