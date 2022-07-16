<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Movie;
use App\User;
use App\MovieFeeling;

class Feeling extends Model
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
    
    public function movie_feeling()
    {
        return $this->belongsTo('App\MovieFeeling');
    }
}
