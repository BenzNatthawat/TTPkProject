<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

   	public function activities(){
   		return $this->belongsToMany('App\Models\Activity');
   	}

}
