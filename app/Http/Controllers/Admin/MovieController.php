<?php

namespace App\Http\Controllers\Admin;

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
        return view('admin.movie.info');
    }
    
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
