<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';

    //Relacion One to many

    Public function comments(){
        return $this->hasMany('\App\Comment')->orderBy('id','desc');
        // de a uno a uno se usa hashone
    }
    //Relacion de muchos a uno
    public function user(){
        return $this->belongsTo('\App\User','user_id');
    }
}
