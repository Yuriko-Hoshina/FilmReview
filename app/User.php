<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Profile;
use App\SocialUser;
use App\Comment;
use Auth;
use GuzzleHttp\Client;
use App\Recommendetion;
use App\Score;
use App\Feeling;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'unique_id', 'avatar', 'bio'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function profile()
    {
        return $this->hasOne('App\Profile');
    }
    
    public function socialUsers()
    {
        return $this->hasMany(SocialUser::class);
    }
    
    public function recommendations()
    {
        return $this->hasMany('App\Recommendation');
    }
    
    public function getAvatar()
    {
        $path = "no_image_square.jpg";
        if($this->avatar != null){
            $path = $this->avatar;
        }elseif($this->profile && $this->profile->image_path != null){
            $path = $this->profile->image_path;
        }
        
        return $path;
    }
    
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    
    public function scores()
    {
        return $this->hasMany('App\Score');
    }
    
    public function feelings()
    {
        return $this->hasMany('App\Feeling');
    }
    
    /*
    public function recommendations(){
        
        return Recommendation::where('movie_id', $this->id)->get();
    }
    */
    
    public function commentedMovies()
    {
        $ids = Comment::where('user_id', $this->id)->groupby('movie_id')->pluck('movie_id');
        //dd($ids);
        
        // 空の配列を作っておく
        $movies = [];
        
        foreach($ids as $id){
            
            $tmdbapikey = config('app.tmdbapikey');
            $url = "https://api.themoviedb.org/3/movie/" . $id . "?api_key=" . $tmdbapikey . "&language=ja";
            $method = "GET";
    
            //接続
            $client = new Client();
    
            $response = $client->request($method, $url);
    
            $data = $response->getBody();
            $data = json_decode($data, true);
            // TMDbから、$idの映画の情報をapiで取得
            // ... jasonDecodeしたデータを$dataに入れる
            // $moviesに、映画の情報を追加
            $movies[] = $data;
        }
        
        return $movies;
        
    }
    
    public function getScore($id)
    {
        $score = Comment::where('user_id', $this->id)->where('movie_id', $id)->first(); 
        
        return $score->score_id;
    }
    
    public function getFeeling($id)
    {
        $feeling = Comment::where('user_id', $this->id)->where('movie_id', $id)->first(); 
        //dd($feeling->feeling_id);
        
        return Feeling::find($feeling->feeling_id);
    }
    
    public function getComment($id)
    {
        $comment = Comment::where('user_id', $this->id)->where('movie_id', $id)->first(); 
        
        return $comment;
    }
    
    
    
    
    
    

}