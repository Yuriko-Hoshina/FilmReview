<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
use Socialite;

class AuthController extends Controller
{
    //
    public function login()
    {
        return Socialite::with('Twitter')->redirect();
    }

    public function callback()
    {
        $socialUser = Socialite::driver('Twitter')->user();
        //dd($socialUser);
        $user = \App\User::where( "unique_id", '=', $socialUser->id )->first();
        if ( $user === null ){
            $user = new \App\User();
            $user->fill( [
                "unique_id" => $socialUser->id ,
                'name'               => $socialUser->name ,
                'avatar'             => $socialUser->avatar ,
                'password'           => 'DUMMY_PASSWORD' ,
            ] );
        //dd($user->toArray());    
            $user->save();
        }
        // Laravel 標準の Auth でログイン
        \Auth::login($user);
        
        return redirect('/user/profile');
    }
    
    
}
