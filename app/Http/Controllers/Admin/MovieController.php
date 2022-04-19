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
        
        $movie->fill($form);
        $movie->save();
        
        return redirect('admin/movie/');
    }
    
    public function info(Request $request)
    {
        $q = $request->q;
        
        if($q !=''){
            $posts = Movie::searchByKeyword($q);
        }else{
            $posts = Movie::all();
        }

        return view('admin.movie.info', compact(['posts', 'q']));
    }
}
