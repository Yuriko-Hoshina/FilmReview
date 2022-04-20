<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Age extends Model
{
    //
    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
    );
    
    public function ages()
    {
        return $this->hasMany('App\Age');
    }
}
