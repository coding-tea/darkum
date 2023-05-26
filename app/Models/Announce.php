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
  public function user()
  {
    return $this->belongsTo(User::class, 'userId');
  }
  public function comments(){
    return $this->hasMany(Comment::class, "announceId");
  }
}
