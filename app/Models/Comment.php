<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'comments';
    public $primaryKey = 'idCom';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;

    public function announce(){
      return $this->belongsTo(Announce::class, 'AnnounceId');
    }
    public function user(){
      return $this->belongsTo(User::class, 'userId');
    }
}
