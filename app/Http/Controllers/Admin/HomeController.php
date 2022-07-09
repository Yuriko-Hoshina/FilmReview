<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use App\User;
use App\Comment;
use App\Profile;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        //全ユーザーのコメント内容(最新10件)を表示
        $comments = Comment::orderBy('updated_at', 'desc')->paginate(10);
        
        //TMDbからPopularを呼び出し
        $tmdbapikey = config('app.tmdbapikey');
        $url = "https://api.themoviedb.org/3/movie/popular?api_key=".$tmdbapikey."&language=ja";
        $method = "GET";

        $client = new Client();

        $response = $client->request($method, $url);

        $posts = $response->getBody();
        $posts = json_decode($posts, true);
        
        return view('admin.index', compact(['comments', 'posts']));
    }
    
    public function comment(Request $request)
    {
        $comments = Comment::orderBy('updated_at', 'desc')->paginate(10);
        
        return view('admin.comment', ['comments' => $comments]);
    }
    
    public function commentDelete(Request $request)
    {
        $comment = Comment::find($request->id);
        $comment->delete();
        
        return redirect('admin/comment');
    }
}
