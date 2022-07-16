<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Movie;
use App\User;
use App\Score;

class MovieScore extends Model
{
    //
    public function movie()
    {
        return $this->belongsTo('App\Movie');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function score()
    {
        return $this->hasOne('App\Score');
    }
}
