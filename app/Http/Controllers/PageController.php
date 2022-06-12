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
        //dd($posts);
        
        return view('home', ['posts' => $posts]);
    }
    
    public function search(Request $request)
    {
        $search = $request->search;
        
        if($search != ''){
        //もし検索内容に入力があればsearchを取得して表示
        $tmdbapikey = config('app.tmdbapikey');
        $url = "https://api.themoviedb.org/3/search/movie?api_key=".$tmdbapikey."&language=ja&query=".$search."&include_adult=false";
        $method = "GET";
        
        $client = new Client();

        $response = $client->request($method, $url);

        $posts = $response->getBody();
        $posts = json_decode($posts, true);
        
        }else{
        //検索内容に何もなければpopularで取得して表示
        $tmdbapikey = config('app.tmdbapikey');
        $url = "https://api.themoviedb.org/3/movie/popular?api_key=".$tmdbapikey."&language=ja";
        $method = "GET";

        $client = new Client();

        $response = $client->request($method, $url);

        $posts = $response->getBody();
        $posts = json_decode($posts, true);
        }
        //dd($posts);
        
        return view('search', compact(['search', 'posts']));
    }
    
    public function detail(Request $request)
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
        //dd($url, $posts);
        
        return view('detail', ['posts' => $posts]);
    }
    
    
    
    public function mypage()
    {
        return view();
    }
}
