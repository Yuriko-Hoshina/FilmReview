<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
    );
    
    public function countries()
    {
        return $this->hasMany('App\Country');
    }
}
