<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use App\Profile;
use App\Age;
use App\Gender;
use App\Genre;
use App\SocialUser;
use App\Comment;
use App\Recommendation;

class UserController extends Controller
{
    //
    public function info(Request $request)
    {
        $posts = User::all();
        
        return view('admin.user.info', ['posts' => $posts]);
    }
    
    /*
    public function edit(Request $request)
    {
        $user = User::find($request->id);
        if(empty($user)){
            abort(404);
        }
        $ages = Ages::all();
        $genres = Genre::all();
        $genders = Gender::all();
        return view('admin.user.edit', compact(['user', 'ages', 'genres', 'genders']));
    }
    
    
    public function update(Request $request)
    {
        $this->validate($request, User::$rules);
        $user = User::find($request->id);
        $user_form = $request->all();
        
        unset($user_form['_token']);
        $user->fill($user_form)->save();
        
        return redirect('admin/user');
    }
    */
    
    public function delete(Request $request)
    {
        $user = User::find($request->id);
        
        $user->profile_id->delete();
        
        Comment::where('user_id', $user->id)->delete();
        Recommendation::where('user_id', $user->id)->delete();
        $user->delete();
        
        return redirect('admin/user');
    }
    
}
