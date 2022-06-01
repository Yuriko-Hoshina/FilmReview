<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PageController extends Controller
{
    // home,search,mypageに飛ぶ
    public function info()
    {
        $tmdbapikey = config('app.tmdbapikey');
        $url = "https://api.themoviedb.org/3/movie/upcoming?api_key=".$tmdbapikey."&language=ja-JA&page=1";
        $method = "GET";

        //接続
        $client = new Client();

        $response = $client->request($method, $url);

        $posts = $response->getBody();
        $posts = json_decode($posts, true);
        
        $tmdbapikey = config('app.tmdbapikey');
        $url = "https://api.themoviedb.org/3/genre/movie/list?api_key=".$tmdbapikey."&language=ja-JA";
        $response = $client->request($method, $url);

        $genres = $response->getBody();
        $genres = json_decode($genres, true);
        //dd($genres);
        

        return view('home', ['posts' => $posts]);
    }
    
    
    /*
    public function home()
    {
        return view('home');
    }*/
    
    
    public function search()
    {
        return view();
    }
    
    public function mypage()
    {
        return view();
    }
}
