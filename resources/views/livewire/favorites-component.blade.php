@if($favorite == true)
<div class="favorite-button" wire:click="toggleFavorite" style="background-color: red">
  <i class="fa-sharp fa-regular fa-heart" style="color:#FFF"></i>
  @else
  <div class="favorite-button" wire:click="toggleFavorite">
  <i class="fa-sharp fa-regular fa-heart" style="color: black"></i>
  @endif
</div>
