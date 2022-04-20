<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    //
    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
    );
    
    public function genders()
    {
        return $this->hasMany('App\Gender');
    }
}
