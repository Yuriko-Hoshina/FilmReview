<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\Age;
use App\Genre;
use App\Gender;
use App\User;
use Carbon\Carbon;
use Auth;
use App\ProfileHistory;

class ProfileController extends Controller
{
    //
    public function add()
    {
        $genres = Genre::all();
        $genders = Gender::all();
        $ages = Age::all();
        
        return view('user.profile.create', compact(['genres', 'genders', 'ages']));
    }
    
    public function create(Request $request)
    {
        
        $this->validate($request, Profile::$rules);
        
        $profile = new Profile;
        $profile->user_id = Auth::id();
        
        $form = $request->all();
        
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $profile->image_path = basename($path);
        } else {
            $profile->image_path = null;
        }
        
        unset($form['_token']);
        unset($form['image']);
        
        $profile->fill($form)->save();
        
        return redirect('user/profile');
    }
    
    public function info(Request $request)
    {
        $profile = Auth::user()->profile;
        $user = Auth::user()->id;
        
        return view('user.profile.info', compact(['profile', 'user']));
    }
    
    public function edit(Request $request)
    {
        $profile = Auth::user()->profile;
        if(empty($profile)){
            abort(404);
        }
        
        $genders = Gender::all();
        $genres = Genre::all();
        $ages = Age::all();
        
        return view('user.profile.edit', compact(['profile', 'genders', 'genres', 'ages']));
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Profile::$rules);
        $profile = Profile::find($request->id);
        $profile_form = $request->all();
        
        if($request->remove == 'true'){
            $profile_form['image_path'] = null;
        }elseif($request->file('image')){
            $path = $request->file('image')->store('public/image');
            $profile_form['image_path'] = basename($path);
        }else{
            $profile_form['image_path'] = $profile->image_path;
        }
        
        unset($profile_form['image']);
        unset($profile_form['remove']);
        unset($profile_form['_token']);
        
        $profile->fill($profile_form)->save();
        
        $profile_history = new ProfileHistory();
        $profile_history->profile_id = $profile->id;
        $profile_history->edited_at = Carbon::now();
        $profile_history->save();
        
        return redirect('user/profile');
    }
    
    public function delete(Request $request)
    {
        $profile = Profile::find($request->id);
        $profile->delete();
        return redirect('user/profile');
    }
}
