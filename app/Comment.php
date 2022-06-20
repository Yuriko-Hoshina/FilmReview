<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Movie;
use App\User;

class Comment extends Model
{
    //
    protected $guarded = array('id');
    
    public static $rules = array(
        'score_id' => 'required',
        'feeling_id' => 'required',
        'comment' => 'required',
    );
    
    public function movie()
    {
        return $this->belongsTo('App\Movie');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    
}
