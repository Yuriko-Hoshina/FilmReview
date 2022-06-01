<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    //
    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
    );
    
    public function genres()
    {
        return $this->hasMany('App\Genre');
    }
    
    public static function getName($tmdb_id)
    {
        $data = self::where('tmdb_id', $tmdb_id)->first();
        return $data->name;
    }
}
