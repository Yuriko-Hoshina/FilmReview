<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Movie;
use App\User;
use App\Feeling;

class MovieFeeling extends Model
{
    //
    protected $guarded = array('id');
    
    public function movie()
    {
        return $this->belongsTo('App\Movie');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function feeling()
    {
        return $this->belongsTo('App\Feeling');
    }
}
