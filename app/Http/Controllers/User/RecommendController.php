<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Auth;
use App\Movie;
use App\Profile;

class RecommendController extends Controller
{
    //
    public function info()
    {
        $name = Auth::user()->profile->name;
        
        return view('user.movie.recommend', ['name' => $name]);
    }
}
