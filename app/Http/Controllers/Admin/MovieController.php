<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;
use App\Genre;
use App\Movie;

class MovieController extends Controller
{
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
        
        //pagination
        $posts = Movie::paginate(10);
        
        return view('admin.movie.info', compact(['posts'/*, 'q'*/]));
    }
    
    /*
    public function search(Request $request)
    {
        $q = $request->q;
        
        if($q !=''){
            $posts = Movie::searchByKeyword($q);
        }else{
            $posts = Movie::all();
        }
        
        return view('admin.movie.info', compact(['posts', 'q']));
    }
    */
    
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
    
    public function delete(Request $request)
    {
        $movie = Movie::find($request->id);
        $movie->delete();
        return redirect('admin/movie');
    }
}
