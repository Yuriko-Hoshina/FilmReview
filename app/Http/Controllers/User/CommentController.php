<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use App\User;
use Auth;

class CommentController extends Controller
{
    //
    public function add(Request $request)
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
    
    public function create(Request $request)
    {
        $this->validate($request, Comment::$rules);
        
        $comment = new Comment;
        $comment->user_id = Auth::id();
        
        $form = $request->all();
        
        unset($form['_token']);
        
        $comment->fill($form)->save();
        
        return redirect('movie/comment');
    }
}
