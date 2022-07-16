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
use App\MovieScore;
use App\MovieFeeling;

class CommentController extends Controller
{
    //
    public function create(Request $request)
    {
        $this->validate($request, Comment::$comment_rules);
        
        $comment = new Comment;
        $comment->user_id = Auth::id();
        
        $form = $request->all();
        
        unset($form['_token']);
        
        $comment->fill($form)->save();
        
        return redirect('user/comments');
    }
    
    public function edit(Request $request)
    {
        $comment = Comment::find($request->id);
        //dd($comment);
        
        if(empty($comment)){
            abort(404);
        }
        
        $comments = Comment::all();
        
        $scores = Score::all();
        $feelings = Feeling::all();
        
        return view('user.comment.edit', compact(['comment', 'scores', 'feelings', 'comments']));
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Comment::$comment_rules);
        $comment = Comment::find($request->id);
        $comment_form = $request->all();
        
        unset($comment_form['_token']);
        
        $comment->fill($comment_form)->save();
        
        return redirect('user/comments');
    }
    
    
    public function info(Request $request)
    {
        $user = Auth::user();
        
        //$commentedMovies = $user->commentedMovies();
        //dd($commentedMovies);
        
        $scores = MovieScore::all();
        $feelings = MovieFeeling::all();
        
        $comments = Comment::where('user_id', Auth::user()->id)->get();
            
        return view('user.movie.comment', compact(['user', 'scores', 'feelings', 'comments']));
    }
    
    
    public function add(Request $request)
    {
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
        
        return view('user.score.create', compact(['post', 'scores', 'feelings']));
    }
    
    public function scoreCreate(Request $request)
    {
        $this->validate($request, Comment::$rules);
        
        $score = new Score;
        $score->user_id = Auth::id();
        
        $form = $request->all();
        
        unset($form['title']);
        unset($form['_token']);
        
        $score->fill($form)->save();
        
        return redirect('/');
    }
    
    public function scoreEdit(Request $request)
    {
        $comment = Comment::find($request->id);
        //dd($comment);
        
        if(empty($comment)){
            abort(404);
        }
        
        $scores = Score::all();
        $feelings = Feeling::all();
        
        return view('user.score.edit', compact(['comment', 'scores', 'feelings', 'comments']));
    }
    
    public function scoreUpdate(Request $request)
    {
        $this->validate($request, Comment::$rules);
        $comment = Comment::find($request->id);
        $comment_form = $request->all();
        
        unset($comment_form['_token']);
        
        $comment->fill($comment_form)->save();
        
        return redirect('/');
    }
    
    
    public function delete(Request $request)
    {
        $comment = Comment::find($request->id);
        $comment->delete();
        
        return redirect('user/comments');
    }
    
}
