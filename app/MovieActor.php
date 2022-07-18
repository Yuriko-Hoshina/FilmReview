<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Actor;
use App\Movie;

class MovieActor extends Model
{
    //
    public function actor()
    {
        return $this->belongsTo('App\Actor');
    }
    
    public function movie()
    {
        return $this->belongsTo('App\Movie');
    }
}
