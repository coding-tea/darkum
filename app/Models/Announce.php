<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announce extends Model
{
  use HasFactory;
  protected $guarded = [];

  public function medias()
  {
      return $this->hasMany(Media::class, 'idAnnounce');
  }

  public function favorits()
  {
    return $this->belongsToMany(User::class);
  }
}
