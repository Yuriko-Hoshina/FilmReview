<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\User;
use Auth;

class CommentController extends Controller
{
    //
    public function add()
    {
        $tmdbapikey = config('app.tmdbapikey');
        $url = "https://api.themoviedb.org/3/movie/" . $request->movie_id . "?api_key=".$tmdbapikey."&language=ja";
        $method = "GET";
        
        //接続
        $client = new Client();

        $response = $client->request($method, $url);

        $posts = $response->getBody();
        $posts = json_decode($posts, true);
        
        return view('comment', ['posts' => $posts]);
    }
}
