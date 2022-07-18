<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Movie;
use App\User;

class Comment extends Model
{
    //
    protected $guarded = array('id');
    
    public static $comment_rules = array(
        'body' => 'required',
        'title' => 'required',
    );
    
    public static $rules = array(
        'score_id' => 'required',
        'feeling_id' => 'required',
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
