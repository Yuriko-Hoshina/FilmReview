<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Movie;
use App\User;
use App\MovieScore;

class Score extends Model
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
    
    public function movie_score()
    {
        return $this->belongsTo('App\MovieScore');
    }
}
