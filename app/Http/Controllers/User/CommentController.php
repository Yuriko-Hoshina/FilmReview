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
        //$posts = Movie::getDetail();
        
        $scores = Score::all();
        $feelings = Feeling::all();
        
        return view('comment', compact([/*'posts',*/ 'scores', 'feelings']));
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Comment::$rules);
        
        $comment = new Comment;
        $comment->user_id = Auth::id();
        
        $form = $request->all();
        
        unset($form['_token']);
        
        $comment->fill($form)->save();
        
        return redirect('comment');
    }
    
    public function info()
    {
        $name = Auth::user()->profile->name;
        
        return view('user.movie.comment', ['name' => $name]);
    }
}
