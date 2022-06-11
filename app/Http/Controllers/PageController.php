<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Movie;
use App\Country;
use App\Genre;

class PageController extends Controller
{
    // home,search,mypageに飛ぶ
    public function info(Request $request)
    {
        $tmdbapikey = config('app.tmdbapikey');
        $url = "https://api.themoviedb.org/3/movie/upcoming?api_key=".$tmdbapikey."&language=ja-JA";
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
        //dd($posts);
        
        return view('home', ['posts' => $posts]);
    }
    
    public function search(Request $request)
    {
        $search = $request->search;
        
        if($search != ''){
        //もし検索内容に入力があればsearchを取得して表示
        $tmdbapikey = config('app.tmdbapikey');
        $url = "https://api.themoviedb.org/3/search/movie?api_key=".$tmdbapikey."&language=ja-JA&query=".$search."&include_adult=false";
        $method = "GET";
        
        $client = new Client();

        $response = $client->request($method, $url);

        $posts = $response->getBody();
        $posts = json_decode($posts, true);
        
        }else{
        //検索内容に何もなければpopularで取得して表示
        $tmdbapikey = config('app.tmdbapikey');
        $url = "https://api.themoviedb.org/3/movie/popular?api_key=".$tmdbapikey."&language=ja-JA";
        $method = "GET";

        $client = new Client();

        $response = $client->request($method, $url);

        $posts = $response->getBody();
        $posts = json_decode($posts, true);
        }
        
        return view('search', compact(['search', 'posts']));
        
        /*以下はadminのmovieと同じもの
        $q = $request->q;
        
        if($q !=''){
            $posts = Movie::searchByKeyword($q);
        }else{
            $posts = Movie::all();
        }
        */
        //return view('search', compact(['posts', 'q']));
    }
    
    public function mypage()
    {
        return view();
    }
}
