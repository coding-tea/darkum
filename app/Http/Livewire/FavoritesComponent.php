<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FavoritesComponent extends Component
{
  public $favorite = false;

  public function toggleFavorite()
  {
    $this->favorite = !$this->favorite;
  }
  public function render()
  {
    return view('livewire.favorites-component');
  }
}
