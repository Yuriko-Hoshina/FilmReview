<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Gender;
use App\Age;
use App\Genre;

class Profile extends Model
{
    //
    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'gender_id' => 'required|numeric|min:1',
        'age_id' => 'required|numeric|min:1',
        'genre_id' => 'required|numeric|min:1',
        'best_movie' => 'required',
        'introduction' => 'required',
    );
    
    /*public function pro_histories()
    {
        return $this->hasMany('App\ProHistory')->latest('edited_at')->limit(5);
    }*/
    
    public function gender()
    {
        return $this->belongsTo('App\Gender');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
