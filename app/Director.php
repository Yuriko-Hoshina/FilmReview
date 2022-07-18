<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\MovieDirector;

class Director extends Model
{
    //
    protected $fillable = array('id', 'name');
    
    public function movie_directors()
    {
        return $this->hasMany('App\MovieDirector');
    }
}
