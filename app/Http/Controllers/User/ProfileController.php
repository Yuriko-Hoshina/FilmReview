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
        
        return redirect('user/profile/create');
    }
    
    public function info(Request $request)
    {
        return view('user.profile.info');
    }
}
