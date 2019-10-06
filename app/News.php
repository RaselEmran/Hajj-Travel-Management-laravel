<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $with=['category'];
     public function category()
    {
    	return $this->belongsTo('App\Category');
    }
}
