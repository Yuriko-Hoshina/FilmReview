<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\MovieActor;

class Actor extends Model
{
    //
    protected $fillable = array('id', 'name', 'homepage');
    
    public function movie_actors()
    {
        return $this->hasMany('App\MovieActor');
    }
}
