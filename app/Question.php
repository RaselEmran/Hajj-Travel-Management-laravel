<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
     public function package()
    {
    	return $this->belongsTo('App\Package');
    }
}
