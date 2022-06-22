<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use App\User;
use Auth;
use App\Score;
use App\Feeling;
use Carbon\Carbon;
use App\Movie;
use App\Comment;

class CommentController extends Controller
{
    //
    public function add(Request $request)
    {
        //$movie_id = $request->movie_id;
        //$posts = Movie::getDetail();
        
        $tmdbapikey = config('app.tmdbapikey');
        $url = "https://api.themoviedb.org/3/movie/" . $request->movie_id . "?api_key=".$tmdbapikey."&language=ja";
        $method = "GET";

        //接続
        $client = new Client();

        $response = $client->request($method, $url);

        $posts = $response->getBody();
        $posts = json_decode($posts, true);
        
        $scores = Score::all();
        $feelings = Feeling::all();
        
        return view('user.comment.create', compact(['posts', 'scores', 'feelings']));
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Comment::$rules);
        
        $comment = new Comment;
        $comment->user_id = Auth::id();
        
        $form = $request->all();
        
        unset($form['_token']);
        
        $comment->fill($form)->save();
        
        return redirect('/comment');
    }
    
    public function info()
    {
        $name = Auth::user()->profile->name;
        
        return view('user.movie.comment', ['name' => $name]);
    }
}
