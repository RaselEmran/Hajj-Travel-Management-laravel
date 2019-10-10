<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
     protected $with=['user','package'];
     public function user()
    {
    	return $this->belongsTo('App\User');
    }

     public function package()
    {
    	return $this->belongsTo('App\Package');
    }
}
