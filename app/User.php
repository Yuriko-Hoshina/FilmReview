<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Profile;
use App\SocialUser;

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
}
