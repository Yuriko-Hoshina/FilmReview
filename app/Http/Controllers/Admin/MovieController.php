<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;
use App\Genre;
use App\Movie;
use GuzzleHttp\Client;
use App\MovieGenre;
use App\MovieCountry;
use App\MovieActor;
use App\MovieDirector;
use App\Actor;
use App\Director;

class MovieController extends Controller
{
    /*
    public function add()
    {
        $countries = Country::all();
        $genres = Genre::all();
        return view('admin.movie.create', compact(['countries','genres']));
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Movie::$rules);
        $movie = new Movie;
        $form = $request->all();
        
        unset($form['_token']);
        
        $movie->fill($form);
        $movie->save();
        
        return redirect('admin/movie');
    }
    */
    
    public function info(Request $request)
    {
        /*
        $q = $request->q;
        
        if($q != ''){
            
            $q = $request->q;
            //  製作国、ジャンルに関して検索できるように指定
            $country = Country::where('name', 'like', '%' . $q. '%')->first();
            if ($country) {
                $q = Country::where('country_id', $country->id);
                //$q = $q->where('country_id', $country->id);
            }
            
            $genre = Genre::where('name', 'like', '%' . $q. '%')->first();
            if ($genre) {
                //Genre::orWhere('genre_id', $genre->id);
                $q = $q->orWhere('genre_id', $genre->id);
            }
            
            //  タイトル、公開日、監督に関して検索できるように指定
            $q = $q->orWhere('title', 'like', '%' . $q . '%')->
              orWhere('release', 'like', '%' . $q. '%')->
              orWhere('director', 'like', '%' . $q. '%');
              
            
            //$posts = Movie::searchByKeyword($q);
        }else{
            $posts = Movie::all();
        }
        */
        /*
        //personの内容確認
        $tmdbapikey = config('app.tmdbapikey');
        $url = "https://api.themoviedb.org/3/person/66155?api_key=".$tmdbapikey."&language=ja-JA";
        $method = "GET";
        $client = new Client();
        $response = $client->request($method, $url);
        $result = $response->getBody();
        $posts = json_decode($result, true);
        dd($posts);
        */
        
        $genres = MovieGenre::where('movie_id', );
        $countries = MovieCountry::where('movie_id', );
        
        //pagination
        $posts = Movie::paginate(10);
        
        return view('admin.movie.info', compact(['posts'/*, 'q'*/]));
    }
    /*
    public function edit(Request $request)
    {
        $movie = Movie::find($request->id);
        if(empty($movie)){
            abort(404);
        }
        $countries = Country::all();
        $genres = Genre::all();
        return view('admin.movie.edit', compact(['movie', 'countries', 'genres']));
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Movie::$rules);
        $movie = Movie::find($request->id);
        $movie_form = $request->all();
        
        unset($movie_form['_token']);
        $movie->fill($movie_form)->save();
        
        return redirect('admin/movie');
    }
    */
    public function delete(Request $request)
    {
        $movie = Movie::find($request->id);
        $movie->delete();
        return redirect('admin/movie');
    }
    
    public function showGetMovies(Request $request)
    {
        $newMovies = array();
        $page = 1;
        $maxpage = 30;
        
        return view('admin.movie.getmovie', compact(['newMovies', 'page', 'maxpage']));
    }
    
    
    public function getMovies(Request $request)
    {
        $page = $maxpage = 0;
        
        $page = $request->page;
        $tmdbapikey = config('app.tmdbapikey');
        $url = "https://api.themoviedb.org/3/movie/popular?api_key=".$tmdbapikey."&language=ja-JA&page=".$page;
        $method = "GET";

        //接続
        $client = new Client();
        $response = $client->request($method, $url);
        $result = $response->getBody();
        $movies = json_decode($result, true);
        $maxpage = $movies['total_pages'];
        
        //各ムービーのHPを取得してDBに保存
        
        Movie::truncate();
        MovieGenre::truncate();
        MovieCountry::truncate();
        Actor::truncate();
        Director::truncate();
        MovieActor::truncate();
        MovieDirector::truncate();
        //dd($movies['results']);
        $newMovies = array();
        foreach($movies['results'] as $movie) {
            //dd($movie);
            if(Movie::find($movie['id']) != null) {
                continue;
            }
            
            $url = "https://api.themoviedb.org/3/movie/" . $movie['id'] . "?api_key=".$tmdbapikey."&language=ja";
            $client = new Client();
            $response = $client->request($method, $url);
            $tmp = $response->getBody();
            $detail = json_decode($tmp, true);
            //dd($data['production_countries']);
            $model = new Movie();
            
            $model->fill($movie);
            $model->homepage = $detail['homepage'];
            $model->runtime = $detail['runtime'];
            $maxpage = $movies['total_pages'];
            
            if($model->backdrop_path == null) {
                $model->backdrop_path = "";
            }
            
            $movie_id = $model->id;
            $model->save();
            $model = Movie::find($movie['id']);
            $newMovies[] = $model;
            //dd($model->id, $newMovies[0]->id);
            
            foreach($movie['genre_ids'] as $genre) {
                
                $movie_genre = new MovieGenre();
                $movie_genre->movie_id = $movie_id;
                
                $movie_genre->genre_id = $genre;
                //dd($model->id, $genre);
                $movie_genre->save();
            }
            
            foreach($detail['production_countries'] as $country) {
                
                $movie_country = new MovieCountry();
                $movie_country->movie_id = $movie_id;
                
                $movie_country->country_id = $country['iso_3166_1'];
                //dd($movie_id, $movie_country->movie_id);
                $movie_country->save();
            }
            
            //キャストと監督
            $url = "https://api.themoviedb.org/3/movie/" . $movie['id'] . "/credits?api_key=".$tmdbapikey."&language=ja";
            $client = new Client();
            $response = $client->request($method, $url);
            $result = $response->getBody();
            $credits = json_decode($result, true);
            //dd($credits['crew']);
            
            $i = 0;
            foreach($credits['cast'] as $cast)
            {
                if(++$i == 3) {
                    break;
                }
                $actor = Actor::find($cast['id']);
                if($actor == null) {
                    $person = self::getPerson($cast['credit_id']);
                    $actor = new Actor();
                    $actor->id = $cast['id'];
                    $actor->name = $cast['name'];
                    $actor->homepage = $person['homepage'];
                    $actor->save();
                }
                $movie_actor = new MovieActor();
                $movie_actor->movie_id = $movie_id;
                
                $movie_actor->actor_id = $actor->id;
                $movie_actor->save();
            }
            
            foreach($credits['crew'] as $crew)
            {
                if($crew['job'] == "Director") {
                    $director = Director::find($crew['id']);
                    if($director == null) {
                        $director = new Director();
                        $director->id = $crew['id'];
                        $director->name = $crew['name'];
                        $director->save();
                    }
                    $movie_director = new MovieDirector();
                    $movie_director->movie_id = $movie_id;
                    
                    $movie_director->director_id = $director->id;;
                    //dd($director);
                    $movie_director->save();
                }
            }
        }
        if($page <= $maxpage) {
            $page++;
        }
        //dd($newMovies[0]->id);
        
        return view('admin.movie.getmovie', compact(['newMovies', 'page', 'maxpage']));
    }
    
    private static function getPerson($creditId)
    {
        $tmdbapikey = config('app.tmdbapikey');
        $method = "GET";
        $url = "https://api.themoviedb.org/3/credit/" . $creditId . "?api_key=".$tmdbapikey;
        $client = new Client();
        $response = $client->request($method, $url);
        $result = $response->getBody();
        $credit = json_decode($result, true);
        
        $url = "https://api.themoviedb.org/3/person/" . $credit['person']['id'] . "?api_key=".$tmdbapikey."&language=ja";
        $response = $client->request($method, $url);
        $result = $response->getBody();
        $person = json_decode($result, true);
        //dd($person);
    }
    
}
