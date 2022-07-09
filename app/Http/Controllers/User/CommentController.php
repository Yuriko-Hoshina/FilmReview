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

        $post = $response->getBody();
        $post = json_decode($post, true);
        //dd($post);
        
        $scores = Score::all();
        $feelings = Feeling::all();
        
        return view('user.comment.create', compact(['post', 'scores', 'feelings']));
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Comment::$rules);
        
        $comment = new Comment;
        $comment->user_id = Auth::id();
        
        $form = $request->all();
        
        unset($form['_token']);
        
        $comment->fill($form)->save();
        
        return redirect('user/comments');
    }
    
    public function info(Request $request)
    {
        $user = Auth::user();
        
        //$commentedMovies = $user->commentedMovies();
        //dd($commentedMovies);
        
        $scores = Score::all();
        $feelings = Feeling::all();
        
        //一覧の並びを日付順にしたい
        
            
        return view('user.movie.comment', compact(['user', 'scores', 'feelings']));
    }
    
    public function edit(Request $request)
    {
        $comment = Comment::find($request->id);
        //dd($comment);
        
        if(empty($comment)){
            abort(404);
        }
        
        $scores = Score::all();
        $feelings = Feeling::all();
        
        return view('user.comment.edit', compact(['comment', 'scores', 'feelings']));
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Comment::$rules);
        $comment = Comment::find($request->id);
        $comment_form = $request->all();
        
        unset($comment_form['_token']);
        
        $comment->fill($comment_form)->save();
        
        return redirect('user/comments');
    }
    
    public function delete(Request $request)
    {
        $comment = Comment::find($request->id);
        $comment->delete();
        
        return redirect('user/comments');
    }
    
}
