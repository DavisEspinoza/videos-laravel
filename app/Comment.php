<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    //Relacion de muchos a uno
    public function user(){
        return $this->belongsTo('\App\User');
    }
    public function video(){
        return $this->belongsTo('\App\Video');
    }
}
