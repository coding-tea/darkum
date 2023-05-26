<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datas extends Model
{
    use HasFactory;
    protected $guarded = [];

    function users()
    {
        $this->belongsTo(User::class,"userId");
    }
}
