<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $table = 'medias';
    protected $guarded = [];
    
    public function announce()
    {
        return $this->belongsTo(Announce::class, 'idAnnonce');
    }
}
