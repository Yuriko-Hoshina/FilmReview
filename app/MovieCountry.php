<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Country;
use App\Movie;

class MovieCountry extends Model
{
    //
    public function country()
    {
        return $this->belongsTo('App\Country');
    }
    
    public function movie()
    {
        return $this->belongsTo('App\Movie');
    }
}
