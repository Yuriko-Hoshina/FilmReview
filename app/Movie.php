<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Country;
use App\Genre;
use App\Recommendation;
use GuzzleHttp\Client;
use App\Comment;
use App\Score;
use App\Feeling;

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
            $query = $query->where('country_id', $country->id);
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
    
    public function recommendations()
    {
        return $this->hasMany('App\Recommendation');
    }
    
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    
    public function scores()
    {
        return $this->hasMany('App\Score');
    }
    
    public function feelings()
    {
        return $this->hasMany('App\Feeling');
    }
    
    //以下、TMDbからの映画情報取得についての関数
    public static function getDetail()
    {
        //詳細呼び出し
        $tmdbapikey = config('app.tmdbapikey');
        $url = "https://api.themoviedb.org/3/movie/" . $request->movie_id . "?api_key=".$tmdbapikey."&language=ja";
        $method = "GET";

        //接続
        $client = new Client();

        $response = $client->request($method, $url);

        $posts = $response->getBody();
        $posts = json_decode($posts, true);
        
        return $posts->get();
    }
    
    public static function searchMovie()
    {
        $tmdbapikey = config('app.tmdbapikey');
        $url = "https://api.themoviedb.org/3/search/movie?api_key=".$tmdbapikey."&language=ja&query=".$search."&include_adult=false";
        $method = "GET";
        
        $client = new Client();

        $response = $client->request($method, $url);

        $posts = $response->getBody();
        $posts = json_decode($posts, true);
        
        return $posts->get();
    }
    
    public static function getPopular()
    {
        $tmdbapikey = config('app.tmdbapikey');
        $url = "https://api.themoviedb.org/3/movie/popular?api_key=".$tmdbapikey."&language=ja";
        $method = "GET";

        $client = new Client();

        $response = $client->request($method, $url);

        $posts = $response->getBody();
        $posts = json_decode($posts, true);
        
        return $posts->get();
    }
    
    public static function getMovie()
    {
        //近日公開
        $tmdbapikey = config('app.tmdbapikey');
        $url = "https://api.themoviedb.org/3/movie/upcoming?api_key=".$tmdbapikey."&language=ja-JA";
        $method = "GET";

        //接続
        $client = new Client();

        $response = $client->request($method, $url);

        $posts = $response->getBody();
        $posts = json_decode($posts, true);
        
        //ジャンルの日本語対応
        $tmdbapikey = config('app.tmdbapikey');
        $url = "https://api.themoviedb.org/3/genre/movie/list?api_key=".$tmdbapikey."&language=ja-JA";
        $response = $client->request($method, $url);

        $genres = $response->getBody();
        $genres = json_decode($genres, true);
        
        return $posts->get();
    }
    
    //オススメ機能に関して
    public function recommends() 
    {
        return Recommendation::where('movie_id', $this->id)->get();
    }
    
    public function recommendCount() 
    {
        return Recommendation::where('movie_id', $this->id)->count();
    }
}
