<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\User;

class MovieController extends Controller
{
    //
    public function info(Request $request)
    {
        return view('movie');
    }
}
