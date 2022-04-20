<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Country;
use App\Genre;

class Movie extends Model
{
    //
    protected $guarded = array('id');

    public static $rules = array(
        'title' => 'required',
        'director' => 'required',
        'movietime' => 'required',
        'genre_id' => 'required',
        'country_id' => 'required',
        'release' => 'required|date',
        'HP' => 'required',
    );
    
    public function country()
    {
        return $this->belongsTo('App\Country');
    }
    
    public function genre()
    {
        return $this->belongsTo('App\Genre');
    }
    
    public static function searchByKeyword($q)
    {
        $query = self::query();
        //  製作国、ジャンルに関して検索できるように指定
        $country = Country::where('name', 'like', '%' . $q. '%')->first();
        if ($country) {
            $query = $query->where('county_id', $country->id);
        }
        $genre = Genre::where('name', 'like', '%' . $q. '%')->first();
        if ($genre) {
            $query = $query->orWhere('genre_id', $genre->id);
        }
        
        //  タイトル、公開日、監督に関して検索できるように指定
        $query = $query->orWhere('title', 'like', '%' . $q . '%')->
          orWhere('release', 'like', '%' . $q. '%')->
          orWhere('director', 'like', '%' . $q. '%');
          
        return $query->get();
    }
}
