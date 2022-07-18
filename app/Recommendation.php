<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Movie;
use App\User;

class Recommendation extends Model
{
    //
    public function movie()
    {
        return $this->belongsTo('App\Movie');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    protected $fillable = ['movie_id','user_id'];
    
    
    /*
    public function recommended_by_user()
    {
        $id = Auth::id();

        $recommends = array();
        foreach($this->recommends as $recommend) {
          array_push($, $recommend->user_id);
        }
    
        if (in_array($id, $)) {
          return true;
        } else {
          return false;
        }
    }
    */
}
