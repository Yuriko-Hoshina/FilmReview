<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Movie;
use App\Country;
use App\Genre;
use App\Profile;
use App\Age;
use App\Gender;
use App\User;
use Auth;
use App\Comment;
use App\Feeling;
use App\Score;
use App\MovieFeeling;
use App\MovieScore;
use App\Recommendation;

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
        //dd($posts);
        
        //ジャンルの日本語対応
        $tmdbapikey = config('app.tmdbapikey');
        $url = "https://api.themoviedb.org/3/genre/movie/list?api_key=".$tmdbapikey."&language=ja-JA";
        $response = $client->request($method, $url);

        $genres = $response->getBody();
        $genres = json_decode($genres, true);
        //dd($posts);
        
        $recommend = Recommendation::where('movie_id', $request->movie_id)->get();
        //dd($recommend);
        
        return view('home', compact(['posts']));
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
        
        //$posts = Movie::searchMovie();
        
        }else{
        //検索内容に何もなければpopularで取得して表示
        $tmdbapikey = config('app.tmdbapikey');
        $url = "https://api.themoviedb.org/3/movie/popular?api_key=".$tmdbapikey."&language=ja";
        $method = "GET";

        $client = new Client();

        $response = $client->request($method, $url);

        $posts = $response->getBody();
        $posts = json_decode($posts, true);
        //dd($posts);
        
        }
        
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
        
        
        //映画に対するコメントを更新順に並び変える
        $comments = Comment::where('movie_id', $request->movie_id)->orderBy('updated_at', 'desc')->get();
        //dd($comments);
        
        
        $feelings = MovieFeeling::where('movie_id', $request->movie_id)->pluck('feeling_id');
        //dd($feelings);
        
        //映画の平均点
        $average = round(MovieScore::where('movie_id', $request->movie_id)->pluck('score_id')->avg(), 1);
        //dd($average);
        
        
        return view('detail', compact(['posts', 'feelings', 'comments', 'average']));
    }
    
    
    public function mypage(Request $request)
    {
        $profile = Auth::user()->profile;
        $user = Auth::user()->id;
        
        $comments = Comment::where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->limit(10)->get();
        //dd($comments);
        
        
        
        return view('user.profile.info', compact(['profile', 'user', 'comments']));
    }
    
}
