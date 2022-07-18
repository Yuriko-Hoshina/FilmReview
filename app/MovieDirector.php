<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Director;
use App\Movie;

class MovieDirector extends Model
{
    //
    public function director()
    {
        return $this->belongsTo('App\Director');
    }
    
    public function movie()
    {
        return $this->belongsTo('App\Movie');
    }
}
