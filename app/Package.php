<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
     protected $with=['option'];
     public function option()
    {
    	return $this->belongsTo('App\Option');
    }

     public function question() {
		return $this->hasMany('App\Question');
	}
}
