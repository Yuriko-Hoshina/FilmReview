<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Auth;
use App\Movie;
use App\Profile;
use GuzzleHttp\Client;
use App\Recommendation;

class RecommendController extends Controller
{
    //
    public function info()
    {
        $name = Auth::user()->profile->name;
        
        
        return view('user.movie.recommend', ['name' => $name]);
    }
    
    //オススメされたらmovie_id,user_idを保存する
    public function store(Request $request)
    {
        Recommendation::create([
            //'movie_id' => $request->??,
            'user_id' => Auth::id(),
        ]);
        
        return redirect()->back();
    }
    
    //再度オススメ押下で保存していたidを削除する
    public function destroy(Request $request)
    {
        $recommend = Recommendation::where('movie_id', $request->movie_id)->where('user_id', Auth::id())->first();
        $recommend->delete();
    
        return redirect('user/recommend');
    }
}
